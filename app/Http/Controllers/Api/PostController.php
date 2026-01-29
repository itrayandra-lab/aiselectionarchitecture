<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Posts;
use App\Models\PostCategory;
use App\Models\PostTags;
use App\Models\WebIdentity;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class PostController extends Controller
{
    public function index(Request $request)
    {
        $posts = Posts::with(['category', 'createdBy'])
            ->where('status', 'active')
            ->whereNotNull('published_at')
            ->where('published_at', '<=', now())
            ->orderBy('published_at', 'desc')
            ->paginate(10);

        return response()->json([
            'success' => true,
            'data' => $posts
        ]);
    }

    public function store(Request $request)
    {
        $web = WebIdentity::first();

        if(!$web) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        $validKey = $web->api_key_master;

        if (!$validKey || $request->header('X-API-KEY') !== $validKey) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        $request->validate([
            'title'        => 'required|string|max:255',
            'content'      => 'nullable|string',
            'image'        => 'nullable',
            'tags'         => 'nullable',
            'category'     => 'nullable',
            'published_at' => 'nullable|date',
            'meta_data'    => 'nullable',
        ]);

        $slug = Str::slug($request->title);
        if (Posts::where('slug', $slug)->exists()) {
            $slug .= '-' . time();
        }

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('posts', 'public');
        } elseif ($request->filled('image') && str_starts_with($request->image, 'data:image')) {
            $imagePath = $this->saveBase64Image($request->image);
        } elseif ($request->filled('image') && filter_var($request->image, FILTER_VALIDATE_URL)) {
            $imagePath = $this->saveImageFromUrl($request->image, $slug);
        }

        $categoryId = null;
        if ($request->filled('category')) {
            $catInput = $request->input('category');
            $catName = is_array($catInput) ? ($catInput['name'] ?? null) : $catInput;

            if ($catName) {
                $category = PostCategory::firstOrCreate(
                    ['name' => $catName],
                    ['slug' => Str::slug($catName)]
                );
                $categoryId = $category->id;
            }
        }

        $tagIds = [];
        if ($request->filled('tags')) {
            $tagsInput = $request->input('tags');
            if (is_string($tagsInput)) {
                $tagsInput = json_decode($tagsInput, true);
            }

            if (is_array($tagsInput)) {
                foreach ($tagsInput as $tagData) {
                    $tagName = is_array($tagData) ? ($tagData['name'] ?? null) : $tagData;

                    if ($tagName) {
                        $tag = PostTags::firstOrCreate(
                            ['name' => $tagName],
                            ['slug' => Str::slug($tagName)]
                        );
                        $tagIds[] = (string) $tag->id;
                    }
                }
            }
        }

        $adminUser = User::role('admin')->first();
        $createdBy = $adminUser ? $adminUser->id : 1; 


        $post = Posts::create([
            'title'        => $request->title,
            'slug'         => $slug,
            'content'      => $request->content,
            'image'        => $imagePath,
            'category_id'  => $categoryId,
            'tags'         => !empty($tagIds) ? json_encode($tagIds) : null,
            'created_by'   => $createdBy,
            'counter'      => 0,
            'source'       => 'AI',
            'status'       => 'active',
            'published_at' => $request->published_at ?? now(),
            'meta_data'    => $request->meta_data ? json_encode($request->meta_data) : null,
        ]);

        if (!empty($tagIds) && method_exists($post, 'tags')) {
            $post->tags()->sync($tagIds);
        }

        return response()->json([
            'success' => true,
            'message' => 'Post successfully created',
            'data'    => $post
        ], 201);
    }

    private function saveBase64Image($base64Image)
    {
        preg_match('/^data:image\/(\w+);base64,/', $base64Image, $type);
        if (!isset($type[1])) return null;

        $imageType = strtolower($type[1]);
        $imageData = base64_decode(substr($base64Image, strpos($base64Image, ',') + 1));

        if ($imageData === false) return null;

        $fileName = 'posts/' . uniqid() . '.' . $imageType;
        Storage::disk('public')->put($fileName, $imageData);

        return $fileName;
    }

    private function saveImageFromUrl($url, $slug)
    {
        try {
            // Initialize cURL
            $ch = curl_init();
            
            // Set cURL options with extended timeout for large files
            curl_setopt_array($ch, [
                CURLOPT_URL => $url,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_MAXREDIRS => 5,
                CURLOPT_TIMEOUT => 120, // 2 minutes timeout for large files
                CURLOPT_CONNECTTIMEOUT => 30, // 30 seconds connection timeout
                CURLOPT_USERAGENT => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36',
                CURLOPT_SSL_VERIFYPEER => false,
                CURLOPT_SSL_VERIFYHOST => false,
                CURLOPT_HTTPHEADER => [
                    'Accept: image/*,*/*;q=0.8',
                    'Accept-Language: en-US,en;q=0.5',
                    'Cache-Control: no-cache',
                ],
            ]);
            
            // Execute cURL request
            $content = curl_exec($ch);
            $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            $error = curl_error($ch);
            $contentType = curl_getinfo($ch, CURLINFO_CONTENT_TYPE);
            
            curl_close($ch);
            
            // Check for cURL errors or timeout
            if ($content === false || !empty($error)) {
                Log::warning("Failed to download image from URL: {$url}. Error: {$error}");
                return null; // Return null so imagePath will be empty
            }
            
            // Check HTTP status code
            if ($httpCode !== 200) {
                Log::warning("Failed to download image from URL: {$url}. HTTP Code: {$httpCode}");
                return null;
            }
            
            // Validate content type is an image
            if (!str_contains($contentType, 'image/')) {
                Log::warning("URL does not contain valid image: {$url}. Content-Type: {$contentType}");
                return null;
            }
            
            // Determine file extension from content type or URL
            $ext = 'jpg'; // default
            if (str_contains($contentType, 'image/png')) {
                $ext = 'png';
            } elseif (str_contains($contentType, 'image/gif')) {
                $ext = 'gif';
            } elseif (str_contains($contentType, 'image/webp')) {
                $ext = 'webp';
            } elseif (str_contains($contentType, 'image/jpeg') || str_contains($contentType, 'image/jpg')) {
                $ext = 'jpg';
            } else {
                // Fallback to URL extension
                $urlExt = pathinfo(parse_url($url, PHP_URL_PATH), PATHINFO_EXTENSION);
                if (in_array(strtolower($urlExt), ['jpg', 'jpeg', 'png', 'gif', 'webp'])) {
                    $ext = strtolower($urlExt);
                }
            }
            
            // Generate unique filename
            $name = 'posts/' . $slug . '-' . time() . '.' . $ext;
            
            // Save the image
            Storage::disk('public')->put($name, $content);
            
            Log::info("Successfully downloaded and saved image: {$name} from URL: {$url}");
            return $name;
            
        } catch (\Exception $e) {
            Log::error("Exception occurred while downloading image from URL: {$url}. Error: " . $e->getMessage());
            return null; // Return null so imagePath will be empty
        }
    }
}
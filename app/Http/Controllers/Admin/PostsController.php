<?php

namespace App\Http\Controllers\Admin;

use App\Models\Posts;
use App\Models\PostTags;
use App\Helpers\FileHelper;
use Illuminate\Support\Str;
use App\Models\PostCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class PostsController extends Controller
{
   public function index(Request $request)
    {
        if ($request->ajax()) {
            $posts = Posts::with(['category', 'createdBy', 'updatedBy'])
                ->select('posts.*')
                ->latest();

            return DataTables::of($posts)
                ->addIndexColumn()
                ->addColumn('link', fn($post) => '<a href="/'.$post->category?->slug.'/'.$post->slug.'" target="_blank"><i class="fa fa-external-link"></i> Lihat</a>')
                ->addColumn('image', function ($post) {
                    return $post->image
                        ? '<img src="'.getFile($post->image).'" class="img-thumbnail" style="width:60px;height:40px;object-fit:cover;">'
                        : '<span class="text-muted">Tidak ada</span>';
                })
                ->editColumn('counter', fn($post) => number_format($post->counter))
                
                ->editColumn('status', function($post) {
                    $isPublished = $post->status === 'active' 
                                    && $post->published_at 
                                    && $post->published_at <= now();

                    return $isPublished
                        ? '<span class="label label-success">Published</span>'
                        : '<span class="label label-warning">Draft</span>';
                })

                ->addColumn('category', fn($post) => $post->category?->name ?? '-')
                ->addColumn('tags', function ($post) {
                    if (!$post->tags) return '<span class="text-muted">Tidak ada</span>';
                    $tagIds = json_decode($post->tags, true);
                    if (empty($tagIds)) return '<span class="text-muted">Tidak ada</span>';

                    $tagNames = PostTags::whereIn('id', $tagIds)->pluck('name')->take(5)->implode(', ');
                    return $tagNames ?: '<span class="text-muted">Tidak ada</span>';
                })
                ->addColumn('created_by', fn($post) => $post->createdBy?->name ?? '-')
                ->addColumn('updated_by', fn($post) => $post->updatedBy?->name ?? '-')
                ->editColumn('published_at', fn($post) => $post->published_at
                    ? $post->published_at->translatedFormat('d M Y H:i')
                    : '<span class="text-muted">Belum</span>') 
                ->editColumn('created_at', fn($post) => $post->created_at->translatedFormat('d M Y H:i'))
                ->editColumn('updated_at', fn($post) => $post->updated_at->translatedFormat('d M Y H:i'))
                ->addColumn('action', function ($post) {
                    $edit = auth()->user()->can('edit posts')
                        ? '<a href="'.route('posts.edit', $post->id).'" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i></a>'
                        : '';

                    $delete = auth()->user()->can('delete posts')
                        ? '<form action="'.route('posts.destroy', $post->id).'" method="POST" style="display:inline" onsubmit="return confirm(\'Yakin hapus?\')">
                                '.csrf_field().method_field('DELETE').'
                                <button type="submit" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></button>
                        </form>'
                        : '';

                    return '<div class="text-center">'.$edit.' '.$delete.'</div>';
                })
                ->rawColumns(['link', 'image', 'status', 'tags', 'published_at', 'action']) 
                ->make(true);
        }

        return view('pages.admin.posts.index')->with('page', 'Postingan');
    }

    public function create()
    {
        $data = [
            'domains' => ['content-management-system.test', 'domain2.com', 'domain3.com'],
            'categories' => PostCategory::orderBy('id', 'desc')->get(),
            'tags' => PostTags::orderBy('id', 'desc')->get(),
        ];
        return view('pages.admin.posts.create', $data)->with('page', 'Postingan');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'nullable|string',
            'category_id' => 'nullable|exists:post_categories,id',
            'tags' => 'nullable|array',
            'status' => 'required|in:active,inactive',
            'domains' => 'nullable|array',
            'domains.*' => 'string',
            'featured_image' => 'nullable|image|max:2048',
            'published_at' => 'required|date',
            'domain_published_at' => 'nullable|array',
            'image.*' => 'nullable|image|max:2048',
        ]);

        $mainImagePath = null;
        if ($request->hasFile('featured_image')) {
            $mainImagePath = FileHelper::saveFile($request->file('featured_image'), 'posts', Str::slug($request->title) . '-' . time());
        }

        $post = Posts::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'content' => $request->content,
            'image' => $mainImagePath,
            'category_id' => $request->category_id,
            'tags' => $request->tags ? json_encode($request->tags) : null,
            'status' => $request->status,
            'published_at' => $request->published_at,
            'created_by' => auth()->id(),
            'counter' => 0,
        ]);

        $results = [];

        if ($request->has('domains') && is_array($request->domains)) {
            $categoryName = $request->category_id ? PostCategory::find($request->category_id)->name : null;
            
            foreach ($request->domains as $domain) {
                $domainKey = str_replace('.', '_', $domain);
                
                $domainImageUrl = $mainImagePath ? asset($mainImagePath) : null;

                if ($request->hasFile("image.{$domainKey}")) {
                    $customImage = FileHelper::saveFile($request->file("image.{$domainKey}"), 'posts/domains', Str::slug($request->title) . '-' . $domainKey);
                    $domainImageUrl = asset($customImage);
                }

                $domainPublishedAt = $request->input("domain_published_at.{$domainKey}") ?? $request->published_at;

                try {
                    Http::timeout(5)->post("https://{$domain}/api/posts", [
                        'title' => $request->title,
                        'image' => $domainImageUrl,
                        'tag' => $request->tags ?? [],
                        'kategori' => $categoryName,
                        'content' => $request->content,
                        'published_at' => $domainPublishedAt
                    ]);
                    $results[$domain] = 'success';
                } catch (\Exception $e) {
                    $results[$domain] = 'failed';
                }
            }
        }

        Log::info([$results]);

        return response()->json([
            'success' => true,
            'message' => 'Post berhasil disimpan dan diproses.',
            'details' => $results
        ]);
    }

    public function edit($id)
    {
        $data = [
            'categories' => PostCategory::orderBy('id', 'desc')->get(),
            'tags' => PostTags::orderBy('id', 'desc')->get(),
            'post' => Posts::findOrFail($id),
        ];
        return view('pages.admin.posts.edit', $data)->with('page', 'Postingan');
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|max:2048',
            'content' => 'nullable|string',
            'status' => 'required|in:active,inactive',
            'category_id' => 'nullable|exists:post_categories,id',
            'tags' => 'nullable|array',
            'tags.*' => 'exists:post_tags,id',
            'published_at' => 'nullable|date',
        ]);

        try {
            $post = Posts::findOrFail($id);
            $validatedData['slug'] = Str::slug($request->title);

            if ($request->hasFile('image')) {
                $validatedData['image'] = FileHelper::saveFile($request->file('image'), 'posts', 'image');
            }

            if ($request->has('tags')) {
                $validatedData['tags'] = json_encode($request->tags);
            } else {
                $validatedData['tags'] = json_encode([]);
            }

            $validatedData['updated_by'] = auth()->id();

            $post->update($validatedData);

            return redirect()->route('posts.index')->with('success', 'Postingan berhasil diperbarui.');
        } catch (\Exception $e) {
            Log::error('Failed to update post: ' . $e->getMessage());
            return redirect()
                ->back()
                ->with('error', 'Terjadi kesalahan saat memperbarui postingan: ' . $e->getMessage())
                ->withInput();
        }
    }

    public function destroy($id)
    {
        $posts = Posts::findOrFail($id);
        $posts->delete();

        return redirect()->route('posts.index')->with('success', 'Postingan deleted successfully');
    }
}

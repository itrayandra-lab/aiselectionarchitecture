<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Posts;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Deskripsi API
     */
    public function index()
    {
        
        return response()->json([
            'data' => Posts::all(),
            'api_info' => [
                'description' => 'Endpoint ini digunakan untuk menambahkan post baru dengan title, content, dan image (optional).',
                'base_url' => url('/api/posts'),
                'endpoints' => [
                    'POST /api/posts' => [
                        'deskripsi' => 'Menambahkan post baru. Mendukung upload file (multipart/form-data) atau base64 image (JSON body).',
                        'content_type' => [
                            'multipart/form-data' => 'Untuk upload file gambar langsung.',
                            'application/json' => 'Untuk mengirim gambar dalam bentuk base64 string.'
                        ],
                        'parameter' => [
                            'title' => 'string (wajib) — Judul post',
                            'content' => 'string (opsional) — Isi post',
                            'image' => 'file atau base64 string (opsional) — Upload gambar (maks 2MB)',
                        ],
                        'contoh_request_json' => [
                            'title' => 'Judul post baru',
                            'content' => 'Isi post baru',
                            'image' => 'data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD...' 
                        ],
                        'contoh_response' => [
                            'message' => 'Post berhasil dibuat.',
                            'data' => [
                                'id' => 10,
                                'title' => 'Judul post baru',
                                'slug' => 'judul-post-baru',
                                'content' => 'Isi post baru',
                                'image_url' => 'http://your-domain.com/storage/posts/xyz123.jpg'
                            ]
                        ]
                    ]
                ]
            ],
        ]);
    }

    /**
     * Simpan post baru (support n8n)
     */
    public function store(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'title'   => 'required|string|max:255',
            'content' => 'nullable|string',
            'image'   => 'nullable',
        ]);

        $validatedData['slug'] = Str::slug($request->title);

        $imagePath = null;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('posts', 'public');
        }

        elseif ($request->filled('image') && str_starts_with($request->image, 'data:image')) {
            $imagePath = $this->saveBase64Image($request->image);
        }

        if ($imagePath) {
            $validatedData['image'] = $imagePath;
        }

        $validatedData['created_by'] = auth()->id() ?? 1;
        $validatedData['counter'] = 0;
        $validatedData['status'] = 1;

        $post = Posts::create($validatedData);

        $post->image_url = $post->image ? url('storage/' . $post->image) : null;

        return response()->json([
            'message' => 'Post berhasil dibuat.',
            'data' => $post
        ], 201);
    }

    /**
     * 🧩 Helper: Simpan gambar base64 ke storage
     */
    private function saveBase64Image($base64Image)
    {
        preg_match('/^data:image\/(\w+);base64,/', $base64Image, $type);

        if (!isset($type[1])) {
            return null;
        }

        $imageType = strtolower($type[1]); 
        $imageData = substr($base64Image, strpos($base64Image, ',') + 1);
        $imageData = base64_decode($imageData);

        if ($imageData === false) {
            return null;
        }

        $fileName = 'posts/' . uniqid() . '.' . $imageType;
        Storage::disk('public')->put($fileName, $imageData);

        return $fileName;
    }
}

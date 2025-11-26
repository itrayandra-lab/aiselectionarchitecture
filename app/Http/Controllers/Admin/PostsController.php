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
                ->editColumn('status', fn($post) => $post->status === 'published'
                    ? '<span class="label label-success">Published</span>'
                    : '<span class="label label-warning">Draft</span>')
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
                ->rawColumns(['link', 'image', 'status', 'published_at', 'action'])
                ->make(true);
        }

        return view('pages.admin.posts.index')->with('page', 'Postingan');
    }

    public function create()
    {
        $data = [
            'domains' => ['domain1.com', 'domain2.com', 'domain3.com'],
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
            'tags.*' => 'exists:post_tags,id',
            'status' => 'required|in:active,inactive',
            'domains' => 'required|array|min:1',
            'domains.*' => 'string',
            'image.*' => 'nullable|image|max:2048',
            'published_at.*' => 'required|date',
        ]);

        $validated['slug'] = Str::slug($request->title);

        $results = [];

        foreach ($request->domains as $index => $domain) {
            $imagePath = null;

            // Upload gambar per domain
            if ($request->hasFile("image.{$index}")) {
                $file = $request->file("image.{$index}");
                $filename = time() . "_{$index}_" . Str::random(6) . '.' . $file->getClientOriginalExtension();
                $domainPath = "assets/{$domain}";

                $fullPath = public_path($domainPath);
                if (!file_exists($fullPath)) {
                    mkdir($fullPath, 0755, true);
                }

                $file->move($fullPath, $filename);
                $imagePath = "{$domainPath}/{$filename}";
            }

            // Simpan post utama (hanya sekali)
            if ($index === 0) {
                $postData = [
                    'title' => $validated['title'],
                    'slug' => $validated['slug'],
                    'content' => $validated['content'],
                    'image' => $imagePath,
                    'category_id' => $validated['category_id'],
                    'tags' => $request->has('tags') ? json_encode($request->tags) : null,
                    'status' => $validated['status'],
                    'published_at' => $request->input("published_at.{$index}"),
                    'created_by' => auth()->id(),
                    'counter' => 0,
                ];
                $post = Posts::create($postData);
            }

            // Kirim ke API domain
            $imageUrl = $imagePath ? asset($imagePath) : null;

            try {
                Http::timeout(8)->post("https://{$domain}/api/push-post", [
                    'title' => $validated['title'],
                    'slug' => $validated['slug'],
                    'content' => $validated['content'],
                    'image_url' => $imageUrl,
                    'category' => $validated['category_id'] ? PostCategory::find($validated['category_id'])->name : null,
                    'tags' => $request->tags ?? [],
                    'status' => $validated['status'],
                    'published_at' => $request->input("published_at.{$index}"),
                ]);
                $results[$domain] = 'success';
            } catch (\Exception $e) {
                $results[$domain] = 'failed';
            }
        }

        return response()->json([
            'success' => true,
            'message' => 'Post berhasil dipublikasikan ke ' . count($request->domains) . ' domain.',
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

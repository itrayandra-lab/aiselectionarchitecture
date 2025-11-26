<?php

namespace App\Http\Controllers\Admin;

use App\Models\PostTags;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;

class PostTagsController extends Controller
{
    public function index(Request $request)
{
    if ($request->ajax()) {
        $tags = PostTags::latest();

        return DataTables::of($tags)
            ->addIndexColumn()
            ->addColumn('action', function ($tag) {
                $edit = auth()->user()->can('edit tags')
                    ? '<a href="'.route('tags.edit', $tag->id).'" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i></a>'
                    : '';

                $delete = auth()->user()->can('delete tags')
                    ? '<form action="'.route('tags.destroy', $tag->id).'" method="POST" style="display:inline" onsubmit="return confirm(\'Yakin hapus?\')">
                            '.csrf_field().method_field('DELETE').'
                            <button type="submit" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></button>
                       </form>'
                    : '';

                return '<div class="text-center">'.$edit.' '.$delete.'</div>';
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    return view('pages.admin.tags.index')->with('page', 'Tags');
}

    public function create()
    {
        return view('pages.admin.tags.create')->with('page', 'Tags');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255|unique:post_tags,name',
        ]);

        $validatedData['slug'] = Str::slug($request->name);
        
        PostTags::create($validatedData);

        return redirect()->route('tags.index')->with('success', 'Tags created successfully');
    }

    public function edit($id)
    {
        $tags = PostTags::findOrFail($id);
        return view('pages.admin.tags.edit', [
            'tags' => $tags
        ])->with('page', 'Tags');
    }

    public function update(Request $request, $id)
    {
        $tags = PostTags::findOrFail($id);
        $validatedData['slug'] = Str::slug($request->name);
        $validatedData = $request->validate([
            'name' => 'required|string|max:255|unique:post_tags,name,' . $id,
        ]);
    
        $tags->update($validatedData);
    
        return redirect()->route('tags.index')->with('success', 'Tags updated successfully');
    }

    public function destroy($id)
    {
        $tags = PostTags::findOrFail($id);
        $tags->delete();

        return redirect()->route('tags.index')->with('success', 'Tags deleted successfully');
    }
}
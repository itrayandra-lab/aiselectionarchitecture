<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use App\Models\PostCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;

class PostCategories extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $categories = PostCategory::latest();

            return DataTables::of($categories)
                ->addIndexColumn()
                ->addColumn('action', function ($category) {
                    $edit = auth()->user()->can('edit categories')
                        ? '<a href="'.route('categories.edit', $category->id).'" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i></a>'
                        : '';

                    $delete = auth()->user()->can('delete categories')
                        ? '<form action="'.route('categories.destroy', $category->id).'" method="POST" style="display:inline" onsubmit="return confirm(\'Yakin hapus?\')">
                                '.csrf_field().method_field('DELETE').'
                                <button type="submit" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></button>
                        </form>'
                        : '';

                    return '<div class="text-center">'.$edit.' '.$delete.'</div>';
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('pages.admin.categories.index')->with('page', 'Kategori');
    }

    public function create()
    {
        return view('pages.admin.categories.create')->with('page', 'Kategori');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255|unique:post_categories,name',
        ]);
        $validatedData['slug'] = Str::slug($request->name);
        PostCategory::create($validatedData);

        return redirect()->route('categories.index')->with('success', 'Category created successfully');
    }

    public function edit($id)
    {
        $category = PostCategory::findOrFail($id);
        return view('pages.admin.categories.edit', [
            'category' => $category
        ])->with('page', 'Kategori');
    }

    public function update(Request $request, $id)
    {
        $category = PostCategory::findOrFail($id);
    
        $validatedData = $request->validate([
            'name' => 'required|string|max:255|unique:post_categories,name,' . $id,
        ]);
        $validatedData['slug'] = Str::slug($request->name);
        $category->update($validatedData);
    
        return redirect()->route('categories.index')->with('success', 'Category updated successfully');
    }

    public function destroy($id)
    {
        $category = PostCategory::findOrFail($id);
        $category->delete();

        return redirect()->route('categories.index')->with('success', 'Category deleted successfully');
    }
}
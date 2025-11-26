<?php

namespace App\Http\Controllers\Admin;

use App\Models\Ad;
use App\Helpers\FileHelper;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class AdsController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $ads = Ad::latest();

            return DataTables::of($ads)
                ->addIndexColumn()
                ->addColumn('preview', function ($ad) {
                    if ($ad->type === 'youtube') {
                        $youtubeId = preg_match('/(?:youtube\.com\/watch\?v=|youtu\.be\/|youtube\.com\/embed\/)([^&\?\/]+)/', $ad->youtube_url, $matches)
                            ? $matches[1]
                            : '';

                        return $youtubeId
                            ? '<img src="https://img.youtube.com/vi/'.$youtubeId.'/default.jpg" class="img-thumbnail" style="width:90px;height:60px;object-fit:cover;">'
                            : '<span class="text-muted">-</span>';
                    }

                    return $ad->file_path
                        ? '<img src="'.asset($ad->file_path).'" class="img-thumbnail" style="width:90px;height:60px;object-fit:cover;">'
                        : '<span class="text-muted">-</span>';
                })
                ->editColumn('type', fn($ad) => '<span class="label label-'.($ad->type === 'youtube' ? 'danger' : 'info').'">'.strtoupper($ad->type).'</span>')
                ->editColumn('redirect_url', fn($ad) => $ad->redirect_url
                    ? '<a href="'.$ad->redirect_url.'" target="_blank"><small>'.Str::limit($ad->redirect_url, 40).'</small></a>'
                    : '<span class="text-muted">–</span>')
                ->editColumn('is_active', function ($ad) {
                    $checked = $ad->is_active ? 'checked' : '';
                    return '
                        <form action="'.route('ads.toggle', $ad->id).'" method="POST" style="display:inline">
                            '.csrf_field().'
                            <label class="switch switch-sm">
                                <input type="checkbox" '.$checked.' onchange="this.form.submit()">
                                <span class="slider round"></span>
                            </label>
                        </form>
                    ';
                })
                ->addColumn('action', function ($ad) {
                    $edit   = auth()->user()->can('edit ads')
                        ? '<a href="'.route('ads.edit', $ad->id).'" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i></a>'
                        : '';
                    $delete = auth()->user()->can('delete ads')
                        ? '<form action="'.route('ads.destroy', $ad->id).'" method="POST" style="display:inline" onsubmit="return confirm(\'Yakin hapus?\')">
                                '.csrf_field().method_field('DELETE').'
                                <button type="submit" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></button>
                           </form>'
                        : '';

                    return '<div class="action-buttons text-center">'.$edit.' '.$delete.'</div>';
                })
                ->rawColumns(['preview', 'type', 'redirect_url', 'is_active', 'action'])
                ->make(true);
        }

        return view('pages.admin.ads.index')->with('page', 'Iklan');
    }

    public function create()
    {
        return view('pages.admin.ads.create')->with('page', 'Iklan');
    }

    public function store(Request $request)
    {
        $rules = [
            'title'        => 'required|string|max:255',
            'type'         => 'required|in:image,gif,youtube',
            'redirect_url' => 'nullable|url',
            'is_active'    => 'sometimes|boolean',
        ];

        if (in_array($request->type, ['image', 'gif'])) {
            $rules['file'] = 'required|image|mimes:jpeg,png,jpg,gif|max:2048';
        } elseif ($request->type === 'youtube') {
            $rules['youtube_url'] = 'required|url';
        }

        $request->validate($rules);

        $data = [
            'title'        => $request->title,
            'type'         => $request->type,
            'redirect_url' => $request->redirect_url,
            'is_active'    => $request->boolean('is_active', true),
        ];

        if (in_array($request->type, ['image', 'gif']) && $request->hasFile('file') && $request->file('file')->isValid()) {
            $data['file_path'] = FileHelper::saveFile($request->file('file'), 'ads', 'ad_'.time());
        } elseif ($request->type === 'youtube') {
            $data['youtube_url'] = $request->youtube_url;
        }

        Ad::create($data);

        return redirect()->route('ads.index')->with('success', 'Iklan berhasil ditambahkan');
    }

    public function edit($id)
    {
        $ad = Ad::findOrFail($id);
        return view('pages.admin.ads.edit', compact('ad'))->with('page', 'Iklan');
    }

    public function update(Request $request, $id)
    {
        $ad = Ad::findOrFail($id);

        $rules = [
            'title'        => 'required|string|max:255',
            'type'         => 'required|in:image,gif,youtube',
            'redirect_url' => 'nullable|url',
            'is_active'    => 'sometimes|boolean',
        ];

        if (in_array($request->type, ['image', 'gif'])) {
            $rules['file'] = 'sometimes|image|mimes:jpeg,png,jpg,gif|max:2048';
        } elseif ($request->type === 'youtube') {
            $rules['youtube_url'] = 'required|url';
        }

        $request->validate($rules);

        $data = [
            'title'        => $request->title,
            'type'         => $request->type,
            'redirect_url' => $request->redirect_url,
            'is_active'    => $request->boolean('is_active', $ad->is_active),
        ];

        if ($request->type === 'youtube') {
            $data['youtube_url'] = $request->youtube_url;
            $data['file_path']   = null;
        }

        if (in_array($request->type, ['image', 'gif']) && $request->hasFile('file')) {
            if ($ad->file_path) {
                FileHelper::deleteFile($ad->file_path);
            }
            $data['file_path']   = FileHelper::saveFile($request->file('file'), 'ads', 'ad_'.time());
            $data['youtube_url'] = null;
        }

        $ad->update($data);

        return redirect()->route('ads.index')->with('success', 'Iklan berhasil diperbarui');
    }

    public function destroy($id)
    {
        $ad = Ad::findOrFail($id);

        if ($ad->file_path) {
            FileHelper::deleteFile($ad->file_path);
        }

        $ad->delete();

        return redirect()->route('ads.index')->with('success', 'Iklan berhasil dihapus');
    }

    public function toggle($id)
    {
        $ad = Ad::findOrFail($id);
        $ad->update(['is_active' => !$ad->is_active]);

        return back()->with('success', 'Status iklan diperbarui');
    }
}
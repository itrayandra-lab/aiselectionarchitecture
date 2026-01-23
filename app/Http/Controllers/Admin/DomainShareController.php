<?php

namespace App\Http\Controllers\Admin;

use App\Models\ShareDomain;
use Illuminate\Http\Request;
use Illuminate\Support\Str; 
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;

class DomainShareController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $domains = ShareDomain::latest();

            return DataTables::of($domains)
                ->addIndexColumn()
                ->addColumn('domain_name', fn($domain) => $domain->domain_name)
                ->addColumn('api_key', fn($domain) => '<code>'.$domain->api_key.'</code>') 
                ->addColumn('status', function ($domain) {
                    return $domain->status == 'active' 
                        ? '<span class="badge badge-success">Active</span>' 
                        : '<span class="badge badge-secondary">Inactive</span>';
                })
                ->editColumn('created_at', fn($domain) => $domain->created_at->translatedFormat('d M Y H:i'))
                ->addColumn('action', function ($domain) {
                    $edit = auth()->user()->can('edit domain-share')
                        ? '<a href="'.route('domain-share.edit', $domain->id).'" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i></a>'
                        : '';

                    $delete = auth()->user()->can('delete domain-share')
                        ? '<form action="'.route('domain-share.destroy', $domain->id).'" method="POST" style="display:inline" onsubmit="return confirm(\'Yakin hapus?\')">
                                '.csrf_field().method_field('DELETE').'
                                <button type="submit" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></button>
                        </form>'
                        : '';

                    return '<div class="text-center">'.$edit.' '.$delete.'</div>';
                })
                ->rawColumns(['api_key', 'status', 'action'])
                ->make(true);
        }

        return view('pages.admin.domain-share.index')->with('page', 'Domain Share');
    }

    public function create()
    {
        return view('pages.admin.domain-share.create')->with('page', 'Domain Share');
    }

    public function store(Request $request)
    {
        $request->validate([
            'domain_name' => 'required|string|max:255',
            'webhook_url' => 'required|url|max:255',
            'status' => 'required|in:active,inactive',
        ]);

        ShareDomain::create([
            'domain_name' => $request->domain_name,
            'webhook_url' => $request->webhook_url,
            'api_key'     => 'key-' . Str::random(32),
            'status'      => $request->status,
        ]);

        return redirect()->route('domain-share.index')->with('success', 'Domain Share berhasil dibuat');
    }

    public function edit($id)
    {
        $shareDomain = ShareDomain::find($id);
        return view('pages.admin.domain-share.edit', compact('shareDomain'))->with('page', 'Domain Share');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'domain_name' => 'required|string|max:255',
            'webhook_url' => 'required|url|max:255',
            'status' => 'required|in:active,inactive',
        ]);

        $shareDomain = ShareDomain::find($id);
        
        $dataToUpdate = [
            'domain_name' => $request->domain_name,
            'webhook_url' => $request->webhook_url,
            'status' => $request->status,
        ];

        if ($request->has('regenerate_key')) {
             $dataToUpdate['api_key'] = 'key-' . Str::random(32);
        }

        $shareDomain->update($dataToUpdate);

        return redirect()->route('domain-share.index')->with('success', 'Domain Share berhasil diperbarui');
    }

    public function destroy($id)
    {
        $shareDomain = ShareDomain::find($id);
        $shareDomain->delete();

        return redirect()->route('domain-share.index')->with('success', 'Domain Share deleted successfully');
    }
}
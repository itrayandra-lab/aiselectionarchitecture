<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Helpers\FileHelper;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $users = User::with('roles')->latest();

            return DataTables::of($users)
                ->addIndexColumn()
                ->addColumn('image', function ($user) {
                    if ($user->image) {
                        return '<img src="'.getFile($user->image).'" class="img-thumbnail" style="width:50px;height:50px;object-fit:cover;">';
                    }
                    return '<span class="text-muted">Tidak Ada</span>';
                })
                ->editColumn('status', fn($user) => $user->status === 'active' 
                    ? '<span class="label label-success">Aktif</span>' 
                    : '<span class="label label-danger">Tidak Aktif</span>')
                ->addColumn('role', fn($user) => ucfirst($user->getRoleNames()->first() ?? 'Tidak Ada Role'))
                ->editColumn('created_at', fn($user) => \Carbon\Carbon::parse($user->created_at)->translatedFormat('d F Y H:i'))
                ->addColumn('profile_link', fn($user) => '<a href="/author/'.$user->slug.'" target="_blank"><i class="fa fa-external-link"></i> Lihat</a>')
                ->addColumn('action', function ($user) {
                    $editBtn   = auth()->user()->can('edit users')
                        ? '<a href="'.route('users.edit', $user->id).'" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i></a>'
                        : '';

                    $deleteBtn = auth()->user()->can('delete users')
                        ? '<form action="'.route('users.destroy', $user->id).'" method="POST" style="display:inline" onsubmit="return confirm(\'Yakin ingin menghapus?\')">
                                '.csrf_field().method_field('DELETE').'
                                <button type="submit" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></button>
                           </form>'
                        : '';

                    return '<div class="text-center">'.$editBtn.' '.$deleteBtn.'</div>';
                })
                ->rawColumns(['image', 'status', 'profile_link', 'action'])
                ->make(true);
        }

        return view('pages.admin.users.index')->with('page', 'Users');
    }

    public function create()
    {
        return view('pages.admin.users.create')->with('page', 'Users');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'phone_number' => 'nullable|numeric|digits_between:10,13|unique:users',
            'password' => 'required|string|min:3|confirmed',
            'image' => 'nullable|image|max:2048',
            'status' => 'in:active,inactive',
            'role' => 'required|exists:roles,name',
        ]);

        $userData = $request->all();
        $userData['slug'] = slugVerified($request->name);
        $userData['password'] = Hash::make($request->password);

        if ($request->hasFile('image')) {
            $userData['image'] = FileHelper::saveFile($request->file('image'), 'user-images', 'image');
        }

        $user = User::create($userData);
        $user->assignRole($request->input('role'));

        return redirect()
            ->route('users.index')
            ->with('success', 'User berhasil dibuat dengan role ' . ucfirst($request->input('role')));
    }

    public function edit(User $user)
    {
        return view('pages.admin.users.edit', compact('user'))->with('page', 'Users');
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'phone_number' => 'nullable|numeric|digits_between:10,13|unique:users,phone_number,' . $user->id,
            'password' => 'nullable|string|min:3|confirmed',
            'image' => 'nullable|image|max:2048',
            'status' => 'required|in:active,inactive',
            'role' => 'required|exists:roles,name',
        ]);

        $userData = $request->all();
        $userData['slug'] = slugVerified($request->name);

        if ($request->filled('password')) {
            $userData['password'] = Hash::make($request->password);
        } else {
            unset($userData['password']);
        }

        if ($request->hasFile('image')) {
            if ($user->image) {
                FileHelper::deleteFile($user->image);
            }
            $userData['image'] = FileHelper::saveFile($request->file('image'), 'user-images', 'image');
        }

        $user->update($userData);

        $user->syncRoles([$request->input('role')]);

        return redirect()->route('users.index')->with('success', 'User berhasil diperbarui');
    }

    public function destroy(User $user)
    {
        if ($user->image) {
            FileHelper::deleteFile($user->image);
        }

        $user->delete();

        return redirect()->route('users.index')->with('success', 'User deleted successfully');
    }



    #update user profile
    public function profil() {
        $data = [
            'user' => User::find(Auth::user()->id)
        ];
        return view('pages.admin.profil.index',  $data)->with('page', 'Akun Pribadi');
    }

    public function profilUpdate(Request $request)
    {
        $user =  User::find(Auth::user()->id);
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'phone_number' => 'nullable|numeric|digits_between:10,13|unique:users,phone_number,' . $user->id,
            'password' => 'nullable|string|min:3|confirmed',
            'image' => 'nullable|image|max:2048',
        ]);

        $userData = $request->all();
        $userData['slug'] = slugVerified($request->name);

        if ($request->filled('password')) {
            $userData['password'] = Hash::make($request->password);
        } else {
            unset($userData['password']);
        }

        if ($request->hasFile('image')) {
            if ($user->image) {
                FileHelper::deleteFile($user->image);
            }
            $userData['image'] = FileHelper::saveFile($request->file('image'), 'user-images', 'image');
        }

        $user->update($userData);

        return redirect()->back()->with('success', 'Akun berhasil diperbarui');
    }
}

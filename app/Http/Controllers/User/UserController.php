<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use ResponseFormatter;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Models\User\Role as ModelsRole;
use App\DataTables\User\UserListDataTable;
use App\Http\Requests\Users\User\StoreUserRequest;
use App\Http\Requests\Users\User\UpdateUserRequest;


class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(UserListDataTable $dataTable)
    {
        return $dataTable->render('pages.admin.user.user-list.index');
    }

    public function create()
    {
        $roles = ModelsRole::all();

        return view('pages.admin.user.user-list.create', compact('roles'));
    }

    public function store(StoreUserRequest $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->email_verified_at = now();
        $user->password = Hash::make('12345'); // You might want to change this to $request->password or a more secure default
        $user->remember_token = Str::random(10);
        $user->save();
        $user->assignRole($request->role);

        return redirect()->route('user-list.index')->with('success', 'User created successfully');
    }

    public function show(string $id)
    {
        // Implementation not needed for this example
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        $roles = ModelsRole::all();
        $userRole = $user->roles->first();

        return view('pages.admin.user.user-list.edit', compact('user', 'roles', 'userRole'));
    }

    public function update(UpdateUserRequest $request, $id)
    {
        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;

        if ($request->password) {
            $user->password = Hash::make($request->password);
        }

        if ($request->role) {
            $user->syncRoles($request->role);
        }

        $user->save();

        return redirect()->route('user-list.index')->with('success', 'User updated successfully');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return ResponseFormatter::created('Data berhasil dihapus');
        return ResponseFormatter::success('User deleted successfully');
    }
}

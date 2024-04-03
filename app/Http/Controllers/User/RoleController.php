<?php

namespace App\Http\Controllers\User;

use App\DataTables\User\RoleDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Users\Role\StoreRoleRequest;
use App\Http\Requests\Users\Role\UpdateRoleRequest;
use App\Models\Setting\Access;
use App\Models\Setting\Menus;
use App\Models\User\Role as ModelsRole;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role as PermissionModelsRole;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(RoleDataTable $dataTable)
    {
        return $dataTable->render('pages.admin.user.role.index');
    }

    public function create()
    {
        return view('pages.admin.user.role.create');
    }

    public function store(StoreRoleRequest $request)
    {
        ModelsRole::create($request->all());

        return redirect()->route('role.index')->with('success', 'Role created successfully');
    }

    public function show(ModelsRole $role)
    {
        $menus = Menus::all();
        $roleName = PermissionModelsRole::findByName($role->name);
        $permissions = PermissionModelsRole::findByName($role->name)->permissions->pluck('name')->toArray();
        $access = Access::all();

        return view('pages.admin.user.role.show', compact('menus', 'permissions', 'access', 'role'));
    }

    public function edit(ModelsRole $role)
    {
        return view('pages.admin.user.role.edit', [
            'role' => $role,
        ]);
    }

    public function update(UpdateRoleRequest $request, ModelsRole $role)
    {
        $role->name = $request->name;
        $role->guard_name = $request->guard_name;
        $role->save();

        return redirect()->route('role.index')->with('success', 'Role updated successfully');
    }

    public function destroy(string $id)
    {
        $role = ModelsRole::find($id);
        $role->delete();

        return redirect()->route('role.index')->with('error', 'User deleted successfully');
    }

    public function updatePermissions(Request $request, ModelsRole $role)
    {
        $rolePermission = PermissionModelsRole::findByName($role->name);
        $allAccess = $request->except(['_token', '_method']);
        $rolePermission->syncPermissions(array_keys(array_filter($allAccess)));

        return redirect()->back()->with('success', 'Permissions updated successfully');
    }
}

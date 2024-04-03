<?php

namespace Database\Seeders;

use App\Models\Setting\Menus;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class AccessSeeder extends Seeder
{
    public function run(): void
    {
        $roles = Role::all();
        $baseAccess = ['create', 'read', 'update', 'delete'];
        $accesses = [];

        $menus = Menus::all();
        foreach ($menus as $menu) {
            foreach ($baseAccess as $access) {
                $accesses[] = "$menu->module";
                $accesses[] = "$menu->module-$access";
            }
        }

        foreach ($roles as $role) {
            $role->givePermissionTo($accesses);
        }
    }
}

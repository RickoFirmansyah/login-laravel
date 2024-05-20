<?php

namespace Database\Seeders;

use App\Models\Setting\Menus;
use App\Models\User\Role;
use Illuminate\Database\Seeder;


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
            $role->syncPermissions($accesses);
        }
    }
}

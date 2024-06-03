<?php

namespace Database\Seeders;

use App\Models\User\Role;
use Illuminate\Database\Seeder;


class RoleSeeder extends Seeder
{
    public function run()
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        Role::create([
            'name' => 'admin-desa',
        ]);
        Role::create([
            'name' => 'admin-kabupaten',
        ]);
        Role::create([
            'name' => 'admin-petugas-lapangan',
        ]);
    }
}

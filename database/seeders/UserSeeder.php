<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    public function run()
    {
        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@arkatama.test',
            'phone_number' => '081234567890',
            'email_verified_at' => now(),
            'password' => Hash::make('12345'),
            'remember_token' => Str::random(10),
        ]);

        $admin->assignRole('admin-desa');

        $operator = User::create([
            'name' => 'Operator',
            'email' => 'operator@arkatama.test',
            'phone_number' => '081234577890',
            'email_verified_at' => now(),
            'password' => Hash::make('12345'),
            'remember_token' => Str::random(10),
        ]);

        $operator->assignRole('admin-kabupaten');
    }
}

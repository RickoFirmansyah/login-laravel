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
            'nomor_hp' => '081234567890',
            'email_verified_at' => now(),
            'password' => Hash::make('12345'),
            'remember_token' => Str::random(10),
        ]);

        $admin->assignRole('admin-desa');

        $operator = User::create([
            'name' => 'Operator',
            'email' => 'operator@arkatama.test',
            'nomor_hp' => '081234577890',
            'email_verified_at' => now(),
            'password' => Hash::make('12345'),
            'remember_token' => Str::random(10),
        ]);

        $operator->assignRole('admin-kabupaten');

        for ($i = 1; $i <= 10; $i++) {
            $camaba = User::create([
                'name' => 'Petugas ' . $i,
                'email' => 'Petugas' . $i . '@arkatama.test',
                'nomor_hp' => '0812344' . $i . '890',
                'email_verified_at' => now(),
                'password' => Hash::make('12345'),
                'remember_token' => Str::random(10),
            ]);

            $camaba->assignRole('admin-petugas-lapangan');
        }
    }
}

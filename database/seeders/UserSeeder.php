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
            'id' => '9c21c387-4488-44a1-8bb5-1606f442f96e',
            'name' => 'Admin',
            'email' => 'admin@arkatama.test',
            'email_verified_at' => now(),
            'password' => Hash::make('12345'),
            'remember_token' => Str::random(10),
        ]);

        $admin->assignRole('admin');

        $operator = User::create([
            'name' => 'Operator',
            'email' => 'operator@arkatama.test',
            'email_verified_at' => now(),
            'password' => Hash::make('12345'),
            'remember_token' => Str::random(10),
        ]);

        $operator->assignRole('admin-prodi');

        for ($i = 1; $i <= 10; $i++) {
            $camaba = User::create([
                'name' => 'Camaba ' . $i,
                'email' => 'camaba' . $i . '@arkatama.test',
                'email_verified_at' => now(),
                'password' => Hash::make('12345'),
                'remember_token' => Str::random(10),
            ]);

            $camaba->assignRole('camaba');
        }
    }
}

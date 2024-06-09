<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class MonitoringOfficersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        for ($i = 1; $i <= 10; $i++) {
            $user = \App\Models\User::create([
                'id' => $i + 2,
                'name' => 'Petugas ' . $i,
                'email' => 'Petugas' . $i . '@arkatama.test',
                'phone_number' => '0812344' . $i . '890',
                'email_verified_at' => now(),
                'password' => Hash::make('0812344' . $i . '890'),
                'remember_token' => Str::random(10),
            ]);

            $user->assignRole('admin-petugas-lapangan');

            DB::table('monitoring_officers')->insert([
                'user_id' => $user->id,
                'name' => 'Petugas ' . $i,
                'gender' => $faker->randomElement(['Laki-laki', 'perempuan']),
                'email' => 'Petugas' . $i . '@arkatama.test',
                'phone_number' => '0812344' . $i . '890',
                'agency' => $faker->company,
                'created_by' => 1,
                'update_by' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}

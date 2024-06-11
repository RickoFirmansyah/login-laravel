<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Faker\Factory as Faker;
use App\Models\MonitoringOfficer;

class MonitoringOfficersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        for ($i = 1; $i < 11; $i++) {
            $email = 'Petugas' . $faker->unique()->randomNumber() . '@arkatama.test';
            $number = $faker->unique()->numerify('0812344###890');
            $user = \App\Models\User::create([
                'name' => 'Petugas ' . $i,
                'email' => $email,
                'phone_number' => $number,
                'email_verified_at' => now(),
                'password' => Hash::make($number),
                'remember_token' => Str::random(10)
            ]);

            $user->assignRole('admin-petugas-lapangan');

            DB::table('monitoring_officers')->insert([
                'user_id' => $user->id,
                'name' => 'Petugas ' . $i,
                'gender' => $faker->randomElement(['Laki-laki', 'perempuan']),
                'email' => $email,
                'phone_number' => $number,
                'agency' => "1",
                'created_by' => 1,
                'update_by' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
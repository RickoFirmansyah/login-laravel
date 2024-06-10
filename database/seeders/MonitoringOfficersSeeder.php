<?php

namespace Database\Seeders;

use App\Models\MonitoringOfficer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MonitoringOfficersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jenis = MonitoringOfficer::create([
            'user_id' => '1',
            'name' => 'Admin',
            'gender' => 'Laki-laki',
            'address' => 'Perum Griya Abadi',
            'phone_number' => '081234567890',
            'created_by' => '1',
            'update_by' => '1'
        ]);
        $jenis = MonitoringOfficer::create([
            'user_id' => '2',
            'name' => 'Admin',
            'gender' => 'Perempuan',
            'address' => 'Perum Griya Abadi',
            'phone_number' => '081234567890',
            'created_by' => '1',
            'update_by' => '1'
        ]);
        $jenis = MonitoringOfficer::create([
            'user_id' => '3',
            'name' => 'Admin',
            'gender' => 'Perempuan',
            'address' => 'Perum Griya Abadi',
            'phone_number' => '081234567890',
            'created_by' => '1',
            'update_by' => '1'
        ]);
        $jenis = MonitoringOfficer::create([
            'user_id' => '4',
            'name' => 'Admin',
            'gender' => 'Perempuan',
            'address' => 'Perum Griya Abadi',
            'phone_number' => '081234567890',
            'created_by' => '5',
            'update_by' => '1'
        ]);
        $jenis = MonitoringOfficer::create([
            'user_id' => '5',
            'name' => 'Admin',
            'gender' => 'Perempuan',
            'address' => 'Perum Griya Abadi',
            'phone_number' => '081234567890',
            'created_by' => '5',
            'update_by' => '1'
        ]);
        $jenis = MonitoringOfficer::create([
            'user_id' => '6',
            'name' => 'Admin',
            'gender' => 'Perempuan',
            'address' => 'Perum Griya Abadi',
            'phone_number' => '081234567890',
            'created_by' => '1',
            'update_by' => '1'
        ]);
        $jenis = MonitoringOfficer::create([
            'user_id' => '7',
            'name' => 'Admin',
            'gender' => 'Perempuan',
            'address' => 'Perum Griya Abadi',
            'phone_number' => '081234567890',
            'created_by' => '1',
            'update_by' => '1'
        ]);
        $jenis = MonitoringOfficer::create([
            'user_id' => '8',
            'name' => 'Admin',
            'gender' => 'Laki-laki',
            'address' => 'Perum Griya Abadi',
            'phone_number' => '081234567890',
            'created_by' => '1',
            'update_by' => '1'
        ]);
        $jenis = MonitoringOfficer::create([
            'user_id' => '9',
            'name' => 'Admin',
            'gender' => 'Laki-laki',
            'address' => 'Perum Griya Abadi',
            'phone_number' => '081234567890',
            'created_by' => '1',
            'update_by' => '1'
        ]);
        $jenis = MonitoringOfficer::create([
            'user_id' => '10',
            'name' => 'Admin',
            'gender' => 'Laki-laki',
            'address' => 'Perum Griya Abadi',
            'phone_number' => '081234567890',
            'created_by' => '1',
            'update_by' => '1'
        ]);
        
    }
}

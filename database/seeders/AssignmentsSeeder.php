<?php

namespace Database\Seeders;

use App\Models\Assignment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AssignmentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jenis = Assignment::create([
            'monitoring_officer_id' => '1',
            'slaughtering_place_id' => '1',
            'jumlah_penugasan'=>'3',
            'created_by' => '1',
            'update_by' => '1'
        ]);
        $jenis = Assignment::create([
            'monitoring_officer_id' => '1',
            'slaughtering_place_id' => '2',
            'jumlah_penugasan'=>'1',
            'created_by' => '1',
            'update_by' => '1'
        ]);
        $jenis = Assignment::create([
            'monitoring_officer_id' => '2',
            'slaughtering_place_id' => '2',
            'jumlah_penugasan'=>'2',
            'created_by' => '1',
            'update_by' => '1'
        ]);
        $jenis = Assignment::create([
            'monitoring_officer_id' => '2',
            'slaughtering_place_id' => '3',
            'jumlah_penugasan'=>'4',
            'created_by' => '1',
            'update_by' => '1'
        ]);
        $jenis = Assignment::create([
            'monitoring_officer_id' => '3',
            'slaughtering_place_id' => '3',
            'jumlah_penugasan'=>'2',
            'created_by' => '1',
            'update_by' => '1'
        ]);
        $jenis = Assignment::create([
            'monitoring_officer_id' => '3',
            'slaughtering_place_id' => '4',
            'jumlah_penugasan'=>'3',
            'created_by' => '1',
            'update_by' => '1'
        ]);
        $jenis = Assignment::create([
            'monitoring_officer_id' => '4',
            'slaughtering_place_id' => '4',
            'jumlah_penugasan'=>'1',
            'created_by' => '1',
            'update_by' => '1'
        ]);
        $jenis = Assignment::create([
            'monitoring_officer_id' => '4',
            'slaughtering_place_id' => '5',
            'jumlah_penugasan'=>'4',
            'created_by' => '1',
            'update_by' => '1'
        ]);
        $jenis = Assignment::create([
            'monitoring_officer_id' => '5',
            'slaughtering_place_id' => '5',
            'jumlah_penugasan'=>'5',
            'created_by' => '1',
            'update_by' => '1'
        ]);
        $jenis = Assignment::create([
            'monitoring_officer_id' => '6',
            'slaughtering_place_id' => '6',
            'jumlah_penugasan'=>'3',
            'created_by' => '1',
            'update_by' => '1'
        ]);
        $jenis = Assignment::create([
            'monitoring_officer_id' => '7',
            'slaughtering_place_id' => '7',
            'jumlah_penugasan'=>'5',
            'created_by' => '1',
            'update_by' => '1'
        ]);
        $jenis = Assignment::create([
            'monitoring_officer_id' => '8',
            'slaughtering_place_id' => '8',
            'jumlah_penugasan'=>'4',
            'created_by' => '1',
            'update_by' => '1'
        ]);
        $jenis = Assignment::create([
            'monitoring_officer_id' => '9',
            'slaughtering_place_id' => '9',
            'jumlah_penugasan'=>'2',
            'created_by' => '1',
            'update_by' => '1'
        ]);
        $jenis = Assignment::create([
            'monitoring_officer_id' => '10',
            'slaughtering_place_id' => '10',
            'jumlah_penugasan'=>'5',
            'created_by' => '1',
            'update_by' => '1'
        ]);
    }
}

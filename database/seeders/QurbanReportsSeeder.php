<?php

namespace Database\Seeders;

use App\Models\QurbanReport;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class QurbanReportsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jenis = QurbanReport::create([
            'monitoring_officer_id' => '1',
            'slaughtering_place_id' => '1',
            'year_id' => '3',
            'date' => '2024-06-14',
            'created_by' => '1',
            'update_by' => '1'
        ]);
        $jenis = QurbanReport::create([
            'monitoring_officer_id' => '1',
            'slaughtering_place_id' => '2',
            'year_id' => '3',
            'date' => '2024-06-14',
            'created_by' => '1',
            'update_by' => '1'
        ]);
        $jenis = QurbanReport::create([
            'monitoring_officer_id' => '2',
            'slaughtering_place_id' => '2',
            'year_id' => '3',
            'date' => '2024-06-14',
            'created_by' => '1',
            'update_by' => '1'
        ]);
        $jenis = QurbanReport::create([
            'monitoring_officer_id' => '2',
            'slaughtering_place_id' => '3',
            'year_id' => '3',
            'date' => '2024-06-14',
            'created_by' => '1',
            'update_by' => '1'
        ]);
        $jenis = QurbanReport::create([
            'monitoring_officer_id' => '3',
            'slaughtering_place_id' => '3',
            'year_id' => '3',
            'date' => '2024-06-14',
            'created_by' => '1',
            'update_by' => '1'
        ]);
        $jenis = QurbanReport::create([
            'monitoring_officer_id' => '3',
            'slaughtering_place_id' => '4',
            'year_id' => '3',
            'date' => '2024-06-14',
            'created_by' => '1',
            'update_by' => '1'
        ]);
        $jenis = QurbanReport::create([
            'monitoring_officer_id' => '4',
            'slaughtering_place_id' => '4',
            'year_id' => '3',
            'date' => '2024-06-14',
            'created_by' => '1',
            'update_by' => '1'
        ]);
        $jenis = QurbanReport::create([
            'monitoring_officer_id' => '4',
            'slaughtering_place_id' => '5',
            'year_id' => '3',
            'date' => '2024-06-14',
            'created_by' => '1',
            'update_by' => '1'
        ]);
        $jenis = QurbanReport::create([
            'monitoring_officer_id' => '5',
            'slaughtering_place_id' => '5',
            'year_id' => '3',
            'date' => '2024-06-15',
            'created_by' => '1',
            'update_by' => '1'
        ]);
        $jenis = QurbanReport::create([
            'monitoring_officer_id' => '6',
            'slaughtering_place_id' => '6',
            'year_id' => '3',
            'date' => '2024-06-15',
            'created_by' => '1',
            'update_by' => '1'
        ]);
        $jenis = QurbanReport::create([
            'monitoring_officer_id' => '7',
            'slaughtering_place_id' => '7',
            'year_id' => '3',
            'date' => '2024-06-14',
            'created_by' => '1',
            'update_by' => '1'
        ]);
        $jenis = QurbanReport::create([
            'monitoring_officer_id' => '8',
            'slaughtering_place_id' => '8',
            'year_id' => '3',
            'date' => '2024-06-15',
            'created_by' => '1',
            'update_by' => '1'
        ]);
        $jenis = QurbanReport::create([
            'monitoring_officer_id' => '9',
            'slaughtering_place_id' => '9',
            'year_id' => '3',
            'date' => '2024-06-16',
            'created_by' => '1',
            'update_by' => '1'
        ]);
        $jenis = QurbanReport::create([
            'monitoring_officer_id' => '10',
            'slaughtering_place_id' => '10',
            'year_id' => '3',
            'date' => '2024-06-17',
            'created_by' => '1',
            'update_by' => '1'
        ]);
    }
}

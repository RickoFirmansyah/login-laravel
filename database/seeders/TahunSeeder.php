<?php

namespace Database\Seeders;

use App\Models\Year;
use Illuminate\Database\Seeder;

class TahunSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jenis = Year::create([
            'tahun' => '2005',
            'status' => 'Non Aktif',
            'created_by' => '1',
            'update_by' => '1'
        ]);

        $jenis = Year::create([
            'tahun' => '2006',
            'status' => 'Non Aktif',
            'created_by' => '1',
            'update_by' => '1'
        ]);

        $jenis = Year::create([
            'tahun' => '2007',
            'status' => 'Aktif',
            'created_by' => '1',
            'update_by' => '1'
        ]);
    }
}
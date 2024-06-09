<?php


namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class TypeOfPlacesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Data contoh untuk type_of_places
        $data = [
            [
                'type_of_place' => 'Rumah',
                'created_by' => Str::uuid(),
                'update_by' => Str::uuid(),
            ],
            [
                'type_of_place' => 'Masjid',
                'created_by' => Str::uuid(),
                'update_by' => Str::uuid(),
            ],
            [
                'type_of_place' => 'Lapangan',
                'created_by' => Str::uuid(),
                'update_by' => Str::uuid(),
            ],
            // Tambahkan data lain sesuai kebutuhan
        ];

        DB::table('type_of_places')->insert($data);
    }
}

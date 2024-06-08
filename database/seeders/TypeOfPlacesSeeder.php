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
                'created_by' => 1,
                'update_by' => 1,
            ],
            [
                'type_of_place' => 'Masjid',
                'created_by' => 2,
                'update_by' => 2,
            ],
            [
                'type_of_place' => 'Lapangan',
                'created_by' => 3,
                'update_by' => 3,
            ],
        ];

        DB::table('type_of_places')->insert($data);
    }
}

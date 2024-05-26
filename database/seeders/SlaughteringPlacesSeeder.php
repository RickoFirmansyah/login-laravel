<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class SlaughteringPlacesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Data contoh untuk Kabupaten Blitar
        $data = [
            [
                'user_id' => '9c21c387-4488-44a1-8bb5-1606f442f96e',
                'type_of_place_id' => 1,
                'provinsi_id' => 15, // Sesuaikan dengan id Provinsi Jawa Timur di tabel ref_provinsi
                'kabupaten_id' => 232, // Sesuaikan dengan id Kabupaten Blitar di tabel ref_kabupaten_kota
                'kecamatan_id' => 3366, // Sesuaikan dengan id kecamatan di Kabupaten Blitar di tabel ref_kecamatan
                'kelurahan_id' => 41798, // Sesuaikan dengan id kelurahan di Kecamatan Blitar di tabel ref_kelurahan
                'cutting_place' => 'Tempat Pemotongan Hewan 1',
                'address' => 'Jalan Raya Blitar No. 1',
                'latitude' => -8.095236, // Koordinat di Kabupaten Blitar
                'longitude' => 112.162762, // Koordinat di Kabupaten Blitar
                'created_by' => '9c21c387-4488-44a1-8bb5-1606f442f96e',
                'update_by' => '9c21c387-4488-44a1-8bb5-1606f442f96e',
            ],
            [
                'user_id' => '9c21c387-4488-44a1-8bb5-1606f442f96e',
                'type_of_place_id' => 1,
                'provinsi_id' => 15, // Sesuaikan dengan id Provinsi Jawa Timur di tabel ref_provinsi
                'kabupaten_id' => 232, // Sesuaikan dengan id Kabupaten Blitar di tabel ref_kabupaten_kota
                'kecamatan_id' => 3366, // Sesuaikan dengan id kecamatan di Kabupaten Blitar di tabel ref_kecamatan
                'kelurahan_id' => 41798, // Sesuaikan dengan id kelurahan di Kecamatan Blitar di tabel ref_kelurahan
                'cutting_place' => 'Tempat Pemotongan Hewan 2',
                'address' => 'Jalan Raya Blitar No. 2',
                'latitude' => -8.109080, // Koordinat di Kabupaten Blitar
                'longitude' => 112.177060, // Koordinat di Kabupaten Blitar
                'created_by' => '9c21c387-4488-44a1-8bb5-1606f442f96e',
                'update_by' => '9c21c387-4488-44a1-8bb5-1606f442f96e',
            ],
            [
                'user_id' => '9c21c387-4488-44a1-8bb5-1606f442f96e',
                'type_of_place_id' => 1,
                'provinsi_id' => 15, // Sesuaikan dengan id Provinsi Jawa Timur di tabel ref_provinsi
                'kabupaten_id' => 232, // Sesuaikan dengan id Kabupaten Blitar di tabel ref_kabupaten_kota
                'kecamatan_id' => 3366, // Sesuaikan dengan id kecamatan di Kabupaten Blitar di tabel ref_kecamatan
                'kelurahan_id' => 41798, // Sesuaikan dengan id kelurahan di Kecamatan Blitar di tabel ref_kelurahan
                'cutting_place' => 'Tempat Pemotongan Hewan 3',
                'address' => 'Jalan Raya Blitar No. 3',
                'latitude' => -8.095236, // Koordinat di Kabupaten Blitar
                'longitude' => 112.162762, // Koordinat di Kabupaten Blitar
                'created_by' => '9c21c387-4488-44a1-8bb5-1606f442f96e',
                'update_by' => '9c21c387-4488-44a1-8bb5-1606f442f96e',
            ]
            // Tambahkan data lain sesuai kebutuhan
        ];

        DB::table('slaughtering_places')->insert($data);
    }
}

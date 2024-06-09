<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class SlaughteringPlacesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $faker = Faker::create();

        // Define the base data
        $baseData = [
            'type_of_place_id' => 1,
            'provinsi_id' => 15,
            'kabupaten_id' => 5,
            'created_by' => 1,
            'update_by' => 1,
        ];

        $cuttingPlaces = [
            'Masjid Al-Hidayah', 'Lapangan Merdeka', 'Rumah Bapak Iqbal',
            'Masjid Al-Ikhlas', 'Balai Desa Sukamaju', 'Lapangan Sepakbola',
            'Rumah Pak RT', 'Masjid Raya', 'Lapangan Upacara', 'Pondok Pesantren'
        ];

        $addresses = [
            'Jalan Patimura No. 1', 'Jalan Raya Senopati No. 2', 'Jalan Sudirman No. 3',
            'Jalan Dinomas No. 4', 'Jalan Fatih No. 5', 'Jalan Mahakam No. 6',
            'Jalan Lampung No. 7', 'Jalan Karsa No. 8', 'Jalan Pinang No. 9',
            'Jalan Pulau No. 10'
        ];

        // Rentang latitude dan longitude untuk Kabupaten Blitar
        $latitudeMin = -8.2100;
        $latitudeMax = -7.9000;
        $longitudeMin = 111.9000;
        $longitudeMax = 112.3000;

        $data = [];
        for ($i = 0; $i < 10; $i++) {
            $data[] = array_merge($baseData, [
                'user_id' => $i + 1,
                'kecamatan_id' => ($i % 3) + 1,
                'kelurahan_id' => ($i % 3) + 1,
                'cutting_place' => $cuttingPlaces[$i],
                'address' => $addresses[$i],
                'latitude' => $faker->latitude($latitudeMin, $latitudeMax),
                'longitude' => $faker->longitude($longitudeMin, $longitudeMax),
                'created_by' => $i + 1,
                'update_by' => $i + 1,
            ]);
        }

        DB::table('slaughtering_places')->insert($data);
    }
}

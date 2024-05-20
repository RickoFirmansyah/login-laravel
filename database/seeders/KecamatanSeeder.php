<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use SplFileObject;

class KecamatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $file = new SplFileObject(public_path('docs/csv/kecamatan.csv'));
        $file->setFlags(SplFileObject::READ_CSV);
        foreach ($file as $index => $row) {
            if ($index > 0) {
                if ($row[0] != null && $row[1] != null) {
                    $kode_provinsi = explode('.', $row[0])[0];
                    $kode_kabupaten = explode('.', $row[0])[1];
                    $kode_kecamatan = explode('.', $row[0])[2];

                    \App\Models\Master\Kecamatan::create([
                        'provinsi_id' => (int)$kode_provinsi,
                        'kabupaten_kota_id' => (int)$kode_kabupaten,
                        'kabupaten_kota_id' => (int)$kode_kabupaten,
                        'kode' => $kode_kecamatan,
                        'nama' => $row[1]
                    ]);
                }
            }
        }
    }
}
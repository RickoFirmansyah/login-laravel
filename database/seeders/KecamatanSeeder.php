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
                    $kode_provinsi = (int)explode('.', $row[0])[0];
                    $kode_kabupaten = (int)explode('.', $row[0])[1];
                    $kode_kecamatan = explode('.', $row[0])[2];

                    // Hanya memasukkan data dengan kode provinsi 35 dan kode kabupaten 05
                    if ($kode_provinsi === 35 && $kode_kabupaten === 05) {
                        \App\Models\Master\Kecamatan::create([
                            'provinsi_id' => $kode_provinsi,
                            'kabupaten_kota_id' => $kode_kabupaten,
                            'kode' => $kode_kecamatan,
                            'nama' => $row[1]
                        ]);
                    }
                }
            }
        }
    }
}

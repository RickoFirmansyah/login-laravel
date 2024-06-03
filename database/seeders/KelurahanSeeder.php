<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use SplFileObject;

class KelurahanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $file = new SplFileObject(public_path('docs/csv/kelurahan.csv'));
        $file->setFlags(SplFileObject::READ_CSV);
        foreach ($file as $index => $row) {
            if ($index > 0) {
                if ($row[0] != null && $row[1] != null) {
                    $kode_provinsi = (int)explode('.', $row[0])[0];
                    $kode_kabupaten = (int)explode('.', $row[0])[1];
                    $kode_kecamatan = (int)explode('.', $row[0])[2];
                    $kode_kelurahan = explode('.', $row[0])[3];

                    // Hanya memasukkan data dengan kode provinsi 35 dan kode kabupaten 05
                    if ($kode_provinsi === 35 && $kode_kabupaten === 5) {
                        $kecamatan = \App\Models\Master\Kecamatan::where('kode', $kode_kecamatan)
                            ->where('kabupaten_kota_id', $kode_kabupaten)
                            ->first();

                        if ($kecamatan) {
                            \App\Models\Master\Kelurahan::create([
                                'kecamatan_id' => $kecamatan->id,
                                'kode' => $kode_kelurahan,
                                'nama' => $row[1]
                            ]);
                        }
                    }
                }
            }
        }
    }
}

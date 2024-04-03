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
                    $kode_kecamatan = explode('.', $row[0])[2];
                    $kode_kelurahan = explode('.', $row[0])[3];

                    $kecamatan = \App\Models\Master\Kecamatan::where('kode', $kode_kecamatan)->first();

                    if ($kecamatan) {
                        $kode_kecamatan = $kecamatan->id;
                        \App\Models\Master\Kelurahan::create([
                            'kecamatan_id' => (int)$kode_kecamatan,
                            'kode' => $kode_kelurahan,
                            'nama' => $row[1]
                        ]);
                    }
                }
            }
        }
    }
}

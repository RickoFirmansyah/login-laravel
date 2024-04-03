<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use SplFileObject;

class KabupatenKotaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $file = new SplFileObject(public_path('docs/csv/kabupaten_kota.csv'));
        $file->setFlags(SplFileObject::READ_CSV);
        foreach ($file as $index => $row) {
            if ($index > 0) {
                if ($row[0] != null && $row[1] != null) {
                    $semua_provinsi = \App\Models\Master\Provinsi::all();
                    $kode_provinsi = explode('.', $row[0])[0];
                    $kode_kabupaten = explode('.', $row[0])[1];
                    foreach ($semua_provinsi as $provinsi) {
                        if ($provinsi->kode == $kode_provinsi) {
                            $kode_provinsi = $provinsi->id;
                            break;
                        }
                    }
                    \App\Models\Master\KabupatenKota::create([
                        'provinsi_id' => (int)$kode_provinsi,
                        'kode' => $kode_kabupaten,
                        'nama' => $row[1]
                    ]);
                }
            }
        }
    }
}

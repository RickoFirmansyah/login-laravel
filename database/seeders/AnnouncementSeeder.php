<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class AnnouncementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('announcement')->insert([
            [
                'title' => 'Penetapan Idul Adha',
                'description' => '<p>Pemerintah menetapkan Iduladha 1445 Hijriah jatuh pada Senin (17/6/2024). Penetapan itu dihasilkan dari Sidang Isbat penentuan 1 Dzulhijjah 1445 Hijriah bersama sejumlah Ormas Islam dan pihak terkait, Jumat (7/6/2024).</p>',
                'created_by' => 1,
                'updated_by' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Jumlah Hewan Qurban',
                'description' => '<p>Jumlah populasi sapi di Kota Blitar mencapai 3.500 ekor dan jumlah kambing sekitar 6-7 ribu ekor, Jum\'at (7/6/2024).</p>',
                'created_by' => 1,
                'updated_by' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Petugas',
                'description' => '<p>Jelang Hari Raya Kurban, Kabupaten Blitar Lepas 273 Petugas Pengawas Kesehatan Hewan</p>',
                'created_by' => 1,
                'updated_by' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'RPH',
                'description' => '<p>KBRN, Blitar : Rumah Pemotongan Hewan (RPH) Dimoro Kota Blitar dipastikan kembali menggratiskan biaya retribusi untuk penyembelihan hewan kurban pada Hari Raya Iduladha 2023. Sehingga, masyarakat dihimbau untuk segera mendaftarkan hewan kurbannya untuk bisa disembelih di RPH.</p>',
                'created_by' => 1,
                'updated_by' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}

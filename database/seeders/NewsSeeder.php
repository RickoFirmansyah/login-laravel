<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('news')->insert([
            [
                'title' => 'Hewan Kurban di Kota Blitar Tahun Ini Mencapai 1.719 Ekor',
                'description' => '<p>KBRN, Blitar : Dinas Ketahanan Pangan dan Pertanian (DKPP) Pemerintah Kota Blitar memastikan pasokan hewan kurban untuk Hari Raya Idul Adha 1445 H/2024 di wilayahnya aman. Stok hewan kurban mulai dari kambing hingga sapi di Kota Blitar lebih dari cukup untuk memenuhi kebutuhan kurban masyarakat.</p><p>Kepala Dinas Ketahanan Pangan dan Pertanian (DKPP) Kota Blitar Dewi Masitoh mengatakan<br>populasi sapi di Kota Blitar mencapai 3.500 N ekor dan populasi kambing mencapai 6.000-7.000 ekor. Jumlah ini dipastikan mampu mencukupi kebutuhan hewan kurban masyarakat Kota Blitar.</p><p>Jumlah populasi sapi di Kota Blitar mencapai 3.500 ekor dan jumlah kambing sekitar 6-7 ribu ekor, Jumat (7/6/2024).</p><p>Dijelaskan Dewi, pada Hari Raya Idul Adha Tahun 2023 yang lalu jumlah hewan kurban sapi yang disembelih sebanyak 533 ekor dan kambing sebanyak 1.631 ekor. Artinya, dengan jumlah yang cukup melimpah ini para peternak bisa memaksimalkan penjualan hewan kurbannya.</p>',
                'image' => 'images/pasarBlitar.jpg',
                'created_by' => 1,
                'updated_by' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Awasi Hewan Kurban, Dinas Peternakan Kabupaten Blitar Terjunkan 273 Petugas Kesehatan',
                'description' => '<p><strong>Blitar, tvOnenews.com </strong>Sebagai bentuk antisipasi hewan kurban terjangkit penyakit, Dinas Peternakan dan Perikanan Kabupaten Blitar menerjunkan 273 petugas untuk mengawasi lapak penjualan hewan dan tempat kurban di setiap Desa dan Kelurahan di Kabupaten Blitar, Rabu (5/6).&nbsp;</p><p>Kepala Bidang Kesehatan Masyarakat Veteriner Disnakkan Kabupaten Blitar, Nanang Miftahudin mengatakan, 273 petugas terjun ke lapangan untuk rutin melakukan pengecekan dan melakukan pengawasan di ratusan lapak penjual hewan kurban serta di masing-masing desa di wilayah Kabupaten Blitar.</p><p>&nbsp;"Kabupaten Blitar telah menyiapkan petugas sebanyak 273 pemantau dan pemeriksa hewan kurban ditugaskan di seluruh Kabupaten Blitar," katanya. Lanjut Nanang, pemeriksaan hewan menjelang hari raya kurban terus digencarkan oleh petugas pengawasan kesehatan hewan kurban Dinas Peternakan Kabupaten Blitar.<br><br>Artikel ini sudah tayang di <a href="https://www.tvonenews.com/"><strong>tvonenews.com</strong></a> pada hari Rabu, 5 Juni 2024 - 14:28 WIB<br>Judul Artikel : <a href="https://www.tvonenews.com/daerah/jatim/216317-awasi-hewan-kurban-dinas-peternakan-kabupaten-blitar-terjunkan-273-petugas-kesehatan"><strong>Awasi Hewan Kurban, Dinas Peternakan Kabupaten Blitar Terjunkan 273 Petugas Kesehatan</strong></a><br>Link Artikel : <a href="https://www.tvonenews.com/daerah/jatim/216317-awasi-hewan-kurban-dinas-peternakan-kabupaten-blitar-terjunkan-273-petugas-kesehatan"><strong>https://www.tvonenews.com/daerah/jatim/216317-awasi-hewan-kurban-dinas-peternakan-kabupaten-blitar-terjunkan-273-petugas-kesehatan</strong></a><br>Oleh : Reporter : Muhammad Imron Editor : Goldhi</p>',
                'image' => 'images/Petugas.jpg',
                'created_by' => 1,
                'updated_by' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Ibadah Qurban Salah Satu Ibadah Penting',
                'description' => '<p>Berkurban merupakan sunnah muakkadah (sunnah yang sangat ditekankan) bagi umat Muslim yang mampu. Hal ini berdasarkan pada berbagai dalil (bukti) dari Al-Quran dan hadis Nabi Muhammad Saw. Salah satu dalil utama tentang kewajiban berkurban adalah firman Allah SWT dalam surah Al-An\'am ayat 162-163, yang menyatakan pentingnya berkorban sebagai bentuk pengabdian kepada-Nya.<br><br><strong>Kriteria Pemenuhan Kewajiban Berkurban</strong></p><ol><li>Kemampuan Finansial: Kewajiban berkurban hanya berlaku bagi mereka yang mampu secara finansial. Kemampuan ini ditentukan berdasarkan harta yang dimiliki seseorang setelah dikurangi oleh kebutuhan dasar dan hutang piutang.</li><li>Usia Hewan: Hewan yang dipersembahkan sebagai qurban harus memenuhi kriteria tertentu, termasuk usia minimal yang telah ditetapkan. Sebagian besar ulama sepakat bahwa usia hewan qurban adalah minimal satu tahun untuk kambing dan domba, dan minimal dua tahun untuk sapi.</li><li>Kesehatan dan Kualitas: Hewan qurban harus sehat, bebas dari cacat fisik atau penyakit yang dapat mempengaruhi kualitas dagingnya. Hal ini penting untuk memastikan bahwa qurban yang dipersembahkan layak untuk dikonsumsi oleh manusia.</li></ol><p><strong>Tata Cara Pelaksanaan Berkurban</strong></p><ol><li>Memilih Hewan Qurban: Pemilihan hewan qurban harus dilakukan dengan teliti sesuai dengan kriteria yang telah ditetapkan. Hewan yang dipilih harus memenuhi persyaratan usia, kesehatan, dan kualitas yang telah dijelaskan sebelumnya.</li><li>Niat: Sebelum penyembelihan, seorang Muslim harus menyatakan niatnya secara jelas bahwa ia melakukan ibadah qurban karena Allah SWT. Niat ini penting untuk menjadikan tindakan penyembelihan hewan sebagai ibadah yang sah dan diterima di sisi Allah SWT.</li><li>Penyembelihan: Penyembelihan hewan qurban harus dilakukan oleh seseorang yang memiliki keahlian dalam menyembelih sesuai dengan syariat Islam. Proses penyembelihan harus dilakukan dengan cara yang menyakitkan sedikit mungkin bagi hewan, dan dilakukan dengan menggunakan pisau yang tajam agar penyembelihan berjalan lancar dan hewan tidak menderita.</li><li>Pembagian Daging: Setelah penyembelihan, daging qurban harus dibagikan kepada yang berhak, termasuk fakir miskin, yatim piatu, dan kaum dhuafa. Bagian-bagian tertentu dari daging juga dapat diberikan kepada kerabat dan tetangga sebagai bentuk silaturahmi dan berbagi kebahagiaan.</li></ol>',
                'image' => 'images/qurban.jpg',
                'created_by' => 1,
                'updated_by' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}

<?php

namespace Database\Seeders;

use App\Models\TypeOfQurban;
use Illuminate\Database\Seeder;

class JenisKurban extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jenis = TypeOfQurban::create([
            'type_of_animal' => 'Sapi',
            'created_by' => '1',
            'update_by' => '1'
        ]);

        $jenis = TypeOfQurban::create([
            'type_of_animal' => 'Kambing',
            'created_by' => '1',
            'update_by' => '1'
        ]);

        $jenis = TypeOfQurban::create([
            'type_of_animal' => 'Domba',
            'created_by' => '1',
            'update_by' => '1'
        ]);

        $jenis = TypeOfQurban::create([
            'type_of_animal' => 'Kerbau',
            'created_by' => '1',
            'update_by' => '1'
        ]);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class DataMaster extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dataTypeDiseases = [
            [
                'type_of_diseases' => 'Cacing',
                'created_by' => '1',
                'update_by' => '1'
            ],
            [
                'type_of_diseases' => 'Penyakit Mulut dan Kuku',
                'created_by' => '1',
                'update_by' => '1'
            ],
            [
                'type_of_diseases' => 'Lumpy Skin Disease',
                'created_by' => '1',
                'update_by' => '1'
            ],
            [
                'type_of_diseases' => 'Peste Des Petits Ruminants',
                'created_by' => '1',
                'update_by' => '1'
            ]
        ];

        DB::table('type_of_diseases')->insert($dataTypeDiseases);

        $dataInstansi = [
            [
                'id' => '1',
                'name_agencies' => 'Dinas Peternakan',
                'created_by' => '1',
                'update_by' => '1'
            ],
            [
                'id' => '2',
                'name_agencies' => 'Dinas Perkebunan',
                'created_by' => '1',
                'update_by' => '1'
            ],
            [
                'id' => '3',
                'name_agencies' => 'Dinas Kelautan',
                'created_by' => '1',
                'update_by' => '1'
            ],
            [
                'id' => '4',
                'name_agencies' => 'Dinas Perikanan',
                'created_by' => '1',
                'update_by' => '1'
            ]
        ];

        DB::table('agencies')->insert($dataInstansi);

        $dataTypeQurban = [
            [
                'type_of_animal' => 'Sapi',
                'created_by' => '1',
                'update_by' => '1'
            ],
            [
                'type_of_animal' => 'Kambing',
                'created_by' => '1',
                'update_by' => '1'
            ],
            [
                'type_of_animal' => 'Domba',
                'created_by' => '1',
                'update_by' => '1'
            ],
            [
                'type_of_animal' => 'Kerbau',
                'created_by' => '1',
                'update_by' => '1'
            ]
        ];

        DB::table('type_of_qurbans')->insert($dataTypeQurban);

        $dataTypePlace = [
            [
                'type_of_place' => 'Rumah',
                'created_by' => 1,
                'update_by' => 1,
            ],
            [
                'type_of_place' => 'Masjid',
                'created_by' => 2,
                'update_by' => 2,
            ],
            [
                'type_of_place' => 'Lapangan',
                'created_by' => 3,
                'update_by' => 3,
            ],
        ];

        DB::table('type_of_places')->insert($dataTypePlace);

        $dataYear = [
            [
                'tahun' => '2005',
                'status' => 'Non Aktif',
                'created_by' => '1',
                'update_by' => '1'
            ],
            [
                'tahun' => '2006',
                'status' => 'Non Aktif',
                'created_by' => '1',
                'update_by' => '1'

            ],
            [
                'tahun' => '2007',
                'status' => 'Non Aktif',
                'created_by' => '1',
                'update_by' => '1'
            ],
            [
                'tahun' => '2008',
                'status' => 'Non Aktif',
                'created_by' => '1',
                'update_by' => '1'
            ],
            [
                'tahun' => '2009',
                'status' => 'Non Aktif',
                'created_by' => '1',
                'update_by' => '1'
            ],
            [
                'tahun' => '2010',
                'status' => 'Non Aktif',
                'created_by' => '1',
                'update_by' => '1'
            ],
            [
                'tahun' => '2011',
                'status' => 'Non Aktif',
                'created_by' => '1',
                'update_by' => '1'
            ],
            [
                'tahun' => '2012',
                'status' => 'Non Aktif',
                'created_by' => '1',
                'update_by' => '1'
            ],
            [
                'tahun' => '2013',
                'status' => 'Non Aktif',
                'created_by' => '1',
                'update_by' => '1'
            ],
            [
                'tahun' => '2014',
                'status' => 'Non Aktif',
                'created_by' => '1',
                'update_by' => '1'
            ],
            [
                'tahun' => '2015',
                'status' => 'Non Aktif',
                'created_by' => '1',
                'update_by' => '1'
            ],
            [
                'tahun' => '2016',
                'status' => 'Non Aktif',
                'created_by' => '1',
                'update_by' => '1'
            ],
            [
                'tahun' => '2017',
                'status' => 'Non Aktif',
                'created_by' => '1',
                'update_by' => '1'
            ],
            [
                'tahun' => '2018',
                'status' => 'Non Aktif',
                'created_by' => '1',
                'update_by' => '1'
            ],
            [
                'tahun' => '2019',
                'status' => 'Non Aktif',
                'created_by' => '1',
                'update_by' => '1'
            ],
            [
                'tahun' => '2020',
                'status' => 'Non Aktif',
                'created_by' => '1',
                'update_by' => '1'
            ],
            [
                'tahun' => '2021',
                'status' => 'Non Aktif',
                'created_by' => '1',
                'update_by' => '1'
            ],
            [
                'tahun' => '2022',
                'status' => 'Non Aktif',
                'created_by' => '1',
                'update_by' => '1'
            ],
            [
                'tahun' => '2023',
                'status' => 'Non Aktif',
                'created_by' => '1',
                'update_by' => '1'
            ],
            [
                'tahun' => '2024',
                'status' => 'Aktif',
                'created_by' => '1',
                'update_by' => '1'
            ],

        ];

        DB::table('years')->insert($dataYear);
    }
}
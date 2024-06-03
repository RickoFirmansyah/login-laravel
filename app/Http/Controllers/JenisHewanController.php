<?php

namespace App\Http\Controllers;

use App\DataTables\LaporanStatistik\JenisHewanDataTable;
use App\Models\QurbanData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Master\KabupatenKota;
use App\Models\Master\Kecamatan;


class JenisHewanController extends Controller
{
    public function index(JenisHewanDataTable $dataTable)
    {
        $qurbanDataCard = DB::table('qurban_data')
            ->join('qurban_reports', 'qurban_data.qurban_report_id', '=', 'qurban_reports.id')
            ->join('type_of_qurbans', 'qurban_data.type_of_qurban_id', '=', 'type_of_qurbans.id')
            ->selectRaw('YEAR(qurban_reports.date) as year,type_of_qurbans.type_of_animal, COUNT(*) as count')
            ->groupBy('year','type_of_animal')
            ->get();
        $formattedDataCard = $this->formatDataCard($qurbanDataCard);
        $formattedData = $this->formatData($qurbanDataCard);


        return $dataTable->render('pages.admin.laporan-statistik.laporan-statistik-jenishewan.index', compact('formattedData','formattedDataCard'));
    
    }

    private function formatData($qurbanDataCard)
{
    // Inisialisasi array untuk menyimpan data hasil format
    $years = $qurbanDataCard->pluck('year')->unique();
    $animalTypes = $qurbanDataCard->pluck('type_of_animal')->unique();
    $formattedData = [];

    // Proses data untuk grafik
    foreach ($years as $year) {
        $formattedData[$year] = [];
        foreach ($animalTypes as $animalType) {
            $count = $qurbanDataCard->where('year', $year)->where('type_of_animal', $animalType)->sum('count');
            $formattedData[$year][$animalType] = $count;
        }
    }

    return $formattedData;
}


    private function formatDataCard($qurbanDataCard)
{
    $animalTypes = $qurbanDataCard->pluck('type_of_animal')->unique();

    $formattedDataCard = [];
    foreach ($animalTypes as $animalType) {
        $animalData = [
            'type_of_animal' => $animalType,
            'count' => $qurbanDataCard->where('type_of_animal', $animalType)->sum('count')
        ];
        $formattedDataCard[] = $animalData;
    }

    return $formattedDataCard;
}


}

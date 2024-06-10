<?php

namespace App\Http\Controllers;

use App\DataTables\LaporanStatistik\JenisHewanDataTable;
use App\Models\QurbanData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Master\KabupatenKota;
use App\Models\Master\Kecamatan;
use App\DataTables\LaporanStatistik\QurbanData2DataTable;


class QurbanData2Controller extends Controller
{
    public function index(QurbanData2DataTable $dataTable)
    {
        $qurbanDataCard = DB::table('qurban_data')
            ->join('qurban_reports', 'qurban_data.qurban_report_id', '=', 'qurban_reports.id')
            ->join('type_of_qurbans', 'qurban_data.type_of_qurban_id', '=', 'type_of_qurbans.id')
            ->selectRaw('YEAR(qurban_reports.date) as year,type_of_qurbans.type_of_animal, COUNT(*) as count')
            ->groupBy('year','type_of_animal')
            ->get();
        $formattedDataCard = $this->formatDataCard($qurbanDataCard);
        $formattedData = $this->formatData($qurbanDataCard);


        return $dataTable->render('pages.admin.laporan-statistik.laporan-statistik-penyakit.index', compact('formattedData','formattedDataCard'));
    
    }

    private function formatData($qurbanDataCard)
{
    $years = $qurbanDataCard->pluck('year')->unique();
    $animals = ['Kambing', 'Sapi', 'Unta', 'Kerbau', 'Domba']; // Jenis hewan yang ingin Anda kelompokkan

    $formattedData = [];
    foreach ($years as $year) {
        $yearData = ['year' => $year];
        foreach ($animals as $animal) {
            $count = $qurbanDataCard->filter(function($item) use ($year, $animal) {
                return $item->year == $year && $item->type_of_animal == $animal;
            })->sum('count');
            $yearData[$animal] = $count;
        }
        $formattedData[] = $yearData;
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

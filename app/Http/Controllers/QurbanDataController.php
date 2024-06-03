<?php

namespace App\Http\Controllers;

use App\DataTables\LaporanStatistik\JenisKelaminDataTable;
use App\Models\QurbanData;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use App\DataTables\LaporanStatistik\QurbanDataDataTable;

class QurbanDataController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(JenisKelaminDataTable $dataTable)
    {
        // Mengambil data dari kolom 'date' di qurban_reports dan mengelompokkan berdasarkan tahun dan jenis kelamin
        $qurbanData = DB::table('qurban_data')
            ->join('qurban_reports', 'qurban_data.qurban_report_id', '=', 'qurban_reports.id')
            ->selectRaw('YEAR(qurban_reports.date) as year, qurban_data.gender, COUNT(*) as count')
            ->groupBy('year', 'gender')
            ->orderBy('year')
            ->get();

        $formattedData = $this->formatData($qurbanData);

        $qurbanDataCard = DB::table('qurban_data')
            ->join('qurban_reports', 'qurban_data.qurban_report_id', '=', 'qurban_reports.id')
            ->join('type_of_qurbans', 'qurban_data.type_of_qurban_id', '=', 'type_of_qurbans.id')
            ->selectRaw('type_of_qurbans.type_of_animal, qurban_data.gender, COUNT(*) as count')
            ->groupBy('type_of_animal', 'gender')
            ->get();

        $formattedDataCard = $this->formatDataCard($qurbanDataCard);

        return $dataTable->render('pages.admin.laporan-statistik.laporan-statistik-jeniskelamin.index', compact('formattedData','formattedDataCard'));
    }

    private function formatData($qurbanData)
    {
        $years = $qurbanData->pluck('year')->unique();
        $genders = ['Jantan', 'Betina'];

        $formattedData = [];
        foreach ($years as $year) {
            $yearData = ['year' => $year];
            foreach ($genders as $gender) {
                $count = $qurbanData->filter(function($item) use ($year, $gender) {
                    return $item->year == $year && $item->gender == $gender;
                })->sum('count');
                $yearData[$gender] = $count;
            }
            $formattedData[] = $yearData;
        }

        return $formattedData;
    }

    private function formatDataCard($qurbanDataCard)
    {
        $animalTypes = $qurbanDataCard->pluck('type_of_animal')->unique();
        $genders = ['Jantan', 'Betina'];

        $formattedDataCard = [];
        foreach ($animalTypes as $animalType) { 
            $animalData = ['type_of_animal' => $animalType];
            foreach ($genders as $gender) {
                $count = $qurbanDataCard->filter(function($item) use ($animalType, $gender) {
                    return $item->type_of_animal == $animalType && $item->gender == $gender;
                })->sum('count');
                $animalData[$gender] = $count;
            }
            $animalData['total'] = $animalData['Jantan'] + $animalData['Betina'];
            $formattedDataCard[] = $animalData;
        }

        return $formattedDataCard;
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(QurbanData $qurbanData)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(QurbanData $qurbanData)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, QurbanData $qurbanData)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(QurbanData $qurbanData)
    {
        //
    }
}

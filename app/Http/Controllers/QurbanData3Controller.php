<?php

namespace App\Http\Controllers;
use App\DataTables\LaporanStatistik\QurbanData3DataTable;
use App\Models\QurbanData;
use Illuminate\Http\Request;

class QurbanData3Controller extends Controller
{
    public function index(QurbanData3DataTable $dataTable)
    {
        return $dataTable->render('pages.admin.laporan-statistik.laporan-statistik-jenishewan.index');
    }

}

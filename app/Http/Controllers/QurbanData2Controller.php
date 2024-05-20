<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\QurbanData;
use App\DataTables\LaporanStatistik\QurbanDataDataTable;

class QurbanData2Controller extends Controller
{
    public function index(QurbanDataDataTable $dataTable)
    {
        return $dataTable->render('pages.admin.laporan-statistik.laporan-statistik-penyakit.index');
    }

}

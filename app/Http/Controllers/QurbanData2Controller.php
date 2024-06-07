<?php

namespace App\Http\Controllers;

use App\Models\QurbanData;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\DataTables\LaporanStatistik\QurbanData2DataTable;


class QurbanData2Controller extends Controller
{
    public function index(QurbanData2DataTable $dataTable)
    {
        return $dataTable->render('pages.admin.laporan-statistik.laporan-statistik-penyakit.index');
    }
}

<?php

namespace App\Http\Controllers;
use App\DataTables\LaporanStatistik\JenisHewanDataTable;
use App\Models\QurbanData;
use Illuminate\Http\Request;

class JenisHewanController extends Controller
{
    public function index(JenisHewanDataTable $dataTable)
    {
        return $dataTable->render('pages.admin.laporan-statistik.laporan-statistik-jenishewan.index');
    }

}

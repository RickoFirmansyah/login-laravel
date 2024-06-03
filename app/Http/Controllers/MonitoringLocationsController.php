<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataTables\PetugasPemantauan\MonitoringLocationsDataTable;


class MonitoringLocationsController extends Controller
{
    public function index(MonitoringLocationsDataTable $dataTable)
    {
        return $dataTable->render('pages.petugas.daftar-lokasi-pemantauan.index');
    }
}

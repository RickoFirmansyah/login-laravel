<?php

namespace App\Http\Controllers;

use App\Models\Assignment;
use Illuminate\Http\Request;
use App\Models\Master\TypeOfQurban;
use App\Http\Controllers\Controller;

class PelaporanPemantauanController extends Controller
{
    public function index()
    {
        $monitoringOfficers = Assignment::where('monitoring_officer_id',auth()->user()->monitoringOfficer->id)->get();
        return view('pages.admin.pelaporan-pemantauan.index', compact('monitoringOfficers'));
    }

    public function create()
    {
        $qurban=TypeOfQurban::all();
        return view('pages.admin.pelaporan-pemantauan.create',compact('qurban'));
    }
}

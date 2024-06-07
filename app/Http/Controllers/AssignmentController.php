<?php

namespace App\Http\Controllers;

use App\Models\Assignment;
use App\Models\MonitoringOfficer;
use App\Models\SlaughteringPlace;
use Illuminate\Http\Request;

class AssignmentController extends Controller
{
    public function index()
    {
        $assignments = Assignment::with(['monitoringOfficer', 'slaughteringPlace'])->get();
        $bcs = [
            ['name' => 'Penugasan', 'link' => '#']
        ];
        return view('pages.admin.penugasan.index', compact('assignments', 'bcs'));
    }

    public function create()
    {
        $monitoringOfficers = MonitoringOfficer::all();
        $slaughteringPlaces = SlaughteringPlace::all();
        $bcs = [
            ['name' => 'Penugasan', 'link' => route('penugasan.index')],
            ['name' => 'Tambah Penugasan', 'link' => '#']
        ];
        return view('pages.admin.penugasan.create', compact('monitoringOfficers', 'slaughteringPlaces', 'bcs'));
    }

}
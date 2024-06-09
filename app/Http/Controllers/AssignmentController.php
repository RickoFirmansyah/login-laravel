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
        $assignments = Assignment::with('monitoringOfficers')->get();
        return view('pages.admin.penugasan.index', compact('assignments'));
    }

    public function create()
    {
        $monitoringOfficers = MonitoringOfficer::all();
        $slaughteringPlaces = SlaughteringPlace::all();
        return view('pages.admin.penugasan.create', compact('monitoringOfficers', 'slaughteringPlaces'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'monitoring_officer_id' => 'required|exists:monitoring_officers,id',
            'slaughtering_place_id' => 'required|exists:slaughtering_places,id',
            'jumlah_penugasan' => 'required|integer',
        ]);

        $assignment = new Assignment();
        $assignment->monitoring_officer_id = $request->monitoring_officer_id;
        $assignment->slaughtering_place_id = $request->slaughtering_place_id;
        $assignment->jumlah_penugasan = $request->jumlah_penugasan;
        $assignment->created_by = auth()->user()->id;
        $assignment->update_by = auth()->user()->id;

        if ($assignment->save()) {
            return redirect()->route('penugasan.index')->with('success', 'Penugasan berhasil ditambahkan');
        } else {
            return redirect()->route('penugasan.index')->with('error', 'Gagal menambahkan penugasan');
        }
    }
}
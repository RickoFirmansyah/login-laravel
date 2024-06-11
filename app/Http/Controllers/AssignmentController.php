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
        $monitoringOfficers = MonitoringOfficer::withCount('assignments')->get();

        return view('pages.admin.penugasan.index', compact('monitoringOfficers'));
    }

    public function addPenugasan($id)
    {
        $officer = MonitoringOfficer::findOrFail($id);
        $slaughteringPlaces = SlaughteringPlace::all();

        return view('pages.admin.penugasan.add-penugasan', compact('officer', 'slaughteringPlaces'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'slaughtering_place_id' => 'required|exists:slaughtering_places,id',
            'officer_id' => 'required|exists:monitoring_officers,id',
            'task_description' => 'nullable|string',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date',
        ]);

        Assignment::create($request->all());

        return redirect()->route('admin.penugasan.index')->with('success', 'Penugasan berhasil ditambahkan');
    }
}

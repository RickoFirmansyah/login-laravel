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
        try {
            $request->validate([
                'assignments' => 'required|array',
                'assignments.*' => 'exists:slaughtering_places,id'
            ]);

            foreach ($request->assignments as $slaughteringPlaceId) {
                Assignment::create([
                    'monitoring_officer_id' => auth()->id(),
                    'slaughtering_place_id' => $slaughteringPlaceId,
                    'jumlah_penugasan' => 1,
                    'created_by' => auth()->user()->id,
                    'update_by' => auth()->user()->id
                ]);
            }

            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}

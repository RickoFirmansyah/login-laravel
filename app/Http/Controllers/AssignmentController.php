<?php

namespace App\Http\Controllers;

use App\Models\QurbanReport;
use Illuminate\Http\Request;
use App\Models\MonitoringOfficer;
use App\Models\SlaughteringPlace;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class AssignmentController extends Controller
{
    public function index()
    {
        $monitoringOfficers = MonitoringOfficer::withCount([
            'qurban_report as assignments_count' => function($query) {
                $query->select(DB::raw('count(distinct id)'));
            }
        ])->get();

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
                'monitoring_officer_id' => 'required|exists:monitoring_officers,id',
                'assignments' => 'required|array',
                'assignments.*.place_id' => 'exists:slaughtering_places,id',
                'assignments.*.date' => 'required|date'
            ]);

            // Mendapatkan year_id untuk tahun saat ini
            $currentYear = date('Y');
            $year = DB::table('years')->where('tahun', $currentYear)->first();
            if (!$year) {
                return response()->json(['error' => 'Year not found'], 404);
            }

            foreach ($request->assignments as $assignment) {
                QurbanReport::create([
                    'monitoring_officer_id' => $request->monitoring_officer_id,
                    'slaughtering_place_id' => $assignment['place_id'],
                    'year_id' => $year->id, // Menggunakan id dari tabel years
                    'date' => $assignment['date'],
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

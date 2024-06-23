<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MonitoringOfficer;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class MonitoringOfficerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $monitoringOfficers = MonitoringOfficer::withCount([
            'qurban_report as assignments_count' => function($query) {
                $query->select(DB::raw('count(distinct id)'));
            }
        ])->get();
        return view('pages.admin.penugasan.index', compact('monitoringOfficers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(MonitoringOfficer $monitoringOfficer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MonitoringOfficer $monitoringOfficer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MonitoringOfficer $monitoringOfficer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MonitoringOfficer $monitoringOfficer)
    {
        //
    }
}

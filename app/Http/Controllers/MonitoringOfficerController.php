<?php

namespace App\Http\Controllers;

use App\Models\MonitoringOfficer;
use Illuminate\Http\Request;

class MonitoringOfficerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $monitoringOfficers = MonitoringOfficer::all(); // Mengambil semua data monitoring officers
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

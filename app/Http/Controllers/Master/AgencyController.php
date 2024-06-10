<?php

namespace App\Http\Controllers\Master;

use App\DataTables\Master\AgencyDataTable;
use App\Http\Controllers\Controller;
use App\Models\Master\Agency;
use Illuminate\Http\Request;
use ResponseFormatter;

class AgencyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(AgencyDataTable $agencyDataTable)
    {
        return $agencyDataTable->render('pages.admin.master.agency.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.admin.master.agency.create');
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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SlaughteringPlace;
use App\Http\Controllers\Controller;
use App\DataTables\Map\SlaughteringPlaceDataTable;

class SlaughteringPlaceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(SlaughteringPlaceDataTable $dataTable)
    {
        return $dataTable->render('pages.admin.map-pemotongan.index');
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
    public function show(SlaughteringPlace $slaughteringPlace)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SlaughteringPlace $slaughteringPlace)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SlaughteringPlace $slaughteringPlace)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SlaughteringPlace $slaughteringPlace)
    {
        //
    }
}
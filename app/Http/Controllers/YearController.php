<?php

namespace App\Http\Controllers;

use App\DataTables\Master\YearDataTable;
use App\Http\Controllers\Controller;
use App\Models\Year;
use Illuminate\Http\Request;
use ResponseFormatter;

class YearController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(YearDataTable $yearDataTable)
    {
        return $yearDataTable->render('pages.admin.master.tahun.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.admin.master.tahun.create');
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

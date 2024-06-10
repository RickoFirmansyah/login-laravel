<?php

namespace App\Http\Controllers\Master;

use App\DataTables\Master\TypeOfDiseasesDataTable;
use App\Http\Controllers\Controller;
use App\Models\Master\TypeOfDiseases;
use Illuminate\Http\Request;
use ResponseFormatter;

class TypeOfDiseasesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(TypeOfDiseasesDataTable $typeOfDiseasesDataTable)
    {
        return $typeOfDiseasesDataTable->render('pages.admin.master.jenis_penyakit.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.admin.master.jenis_penyakit.create');
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

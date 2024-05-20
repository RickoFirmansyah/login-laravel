<?php

namespace App\Http\Controllers;

use App\DataTables\LaporanStatistik\QurbanDataDataTable;
use App\Models\QurbanData;
use Illuminate\Http\Request;

class QurbanDataController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(QurbanDataDataTable $dataTable)
    {
        return $dataTable->render('pages.admin.laporan-statistik.laporan-statistik-jeniskelamin.index');
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
    public function show(QurbanData $qurbanData)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(QurbanData $qurbanData)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, QurbanData $qurbanData)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(QurbanData $qurbanData)
    {
        //
    }
}

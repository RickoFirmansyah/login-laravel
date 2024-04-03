<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\DataTables\Master\ProvinsiDataTable;
use App\Http\Requests\Master\Provinsi\StoreProvinsi;
use App\Models\Master\Provinsi;

class ProvinsiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(ProvinsiDataTable $dataTable)
    {
        return $dataTable->render('pages.admin.master.provinsi.index');
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
    public function store(StoreProvinsi $request)
    {
        if ($request->id != null) {
            $provinsi = Provinsi::find($request->id);
            $provinsi->update($request->all());
            return response()->json([
                'success' => 'Provinsi Berhasil Diubah'
            ]);
        } else {
            Provinsi::create($request->all());
            return response()->json([
                'success' => 'Provinsi Berhasil Ditambahkan'
            ]);
        }
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
        $provinsi = Provinsi::find($id);
        return response()->json($provinsi);
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

        $provinsi = Provinsi::find($id);
        $provinsi->delete();
        return response()->json([
            'success' => 'Provinsi Berhasil Dihapus ' . $id
        ]);
    }
}

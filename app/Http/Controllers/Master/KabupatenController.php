<?php

namespace App\Http\Controllers\Master;

use App\DataTables\Master\KabupatenKotaDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Master\Kabupaten\StoreKabupaten;
use App\Models\Master\KabupatenKota;
use App\Models\Master\Provinsi;
use Illuminate\Http\Request;

class KabupatenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(KabupatenKotaDataTable $dataTable)
    {
        return $dataTable->render('pages.admin.master.kabupaten.index', ['semua_provinsi' => Provinsi::all()]);
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
    public function store(StoreKabupaten $request)
    {
        if ($request->id != null) {
            $kabupatenkota = KabupatenKota::find($request->id);
            $kabupatenkota->update($request->all());
            return response()->json([
                'success' => 'kabupatenkota Berhasil Diubah'
            ]);
        } else {
            KabupatenKota::create($request->all());
            return response()->json([
                'success' => 'Kabupaten Berhasil Ditambahkan'
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
        $kabupatenkota = KabupatenKota::find($id);
        return response()->json($kabupatenkota);
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
        $kabupatenkota = KabupatenKota::find($id);
        $kabupatenkota->delete();
        $nama = $kabupatenkota->nama;
        return response()->json([
            'success' => 'Kabupaten Berhasil Dihapus ' . $nama
        ]);
    }
}

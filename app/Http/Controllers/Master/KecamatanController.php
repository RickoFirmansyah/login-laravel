<?php

namespace App\Http\Controllers\Master;

use App\DataTables\Master\KecamatanDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Master\Kecamatan\StoreKecamatan;
use App\Models\Master\KabupatenKota;
use App\Models\Master\Kecamatan;
use Illuminate\Http\Request;

class KecamatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(KecamatanDataTable $dataTable)
    {
        return $dataTable->render('pages.admin.master.kecamatan.index', [
            'semua_kabupaten_kota' => KabupatenKota::all()
        ]);
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
    public function store(StoreKecamatan $request)
    {
        if ($request->id != null) {
            $kecamatan = Kecamatan::find($request->id);
            $kecamatan->update($request->all());
            return response()->json([
                'success' => 'Kecamatan Berhasil Diubah'
            ]);
        } else {
            Kecamatan::create($request->all());
            return response()->json([
                'success' => 'Kecamatan Berhasil Ditambahkan'
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
        $kecamatan = Kecamatan::find($id);
        return response()->json($kecamatan);
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
        $kecamatan = Kecamatan::find($id);
        $kecamatan->delete();
        return response()->json([
            'success' => 'Kecamatan Berhasil Dihapus'
        ]);
    }
}

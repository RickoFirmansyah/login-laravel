<?php

namespace App\Http\Controllers;

use App\DataTables\Master\JenisKurbanDataTable;
use App\Models\TypeOfQurban;
use Illuminate\Http\Request;

class TypeOfQurbanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(JenisKurbanDataTable $jenisKurbanDataTable)
    {
        return $jenisKurbanDataTable->render('pages.admin.master.jenis_kurban.index');
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
        if ($request->id != null) {
            $kabupatenkota = TypeOfQurban::find($request->id);
            $kabupatenkota->update(array_merge($request->all(), ['updated_by' => auth()->id(), 'created_by' => auth()->id()]));
            // $kabupatenkota->update($request->all());
            return response()->json([
                'success' => 'Data Jenis Kurban Berhasil Diubah'
            ]);
        } else {
            $data = array_merge($request->all(), ['created_by' => auth()->id(), 'update_by' => auth()->id()]);
            TypeOfQurban::create($data);
            // TypeOfQurban::create($request->all());
            return response()->json([
                'success' => 'Data Jenis Kurban Berhasil Ditambahkan'
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(TypeOfQurban $typeOfQurban)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TypeOfQurban $typeOfQurban)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TypeOfQurban $typeOfQurban)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $provinsi = TypeOfQurban::find($id);
        $provinsi->delete();
        return response()->json([
            'success' => 'Data Jenis Kurban Berhasil Dihapus ' . $id
        ]);
    }
}

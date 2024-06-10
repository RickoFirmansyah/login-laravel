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
        $request->validate([
            'jenis_kurban' => 'required',
        ]);

        if ($request->id != null) {
            $data = TypeOfDiseases::findOrFail($request->id);
            $data->update(
                array_merge(
                    ['type_of_diseases' => $request->jenis_kurban],
                    ['update_by' => auth()->user()->id]
                )
            );

            return response()->json(['success' => ' updated successfully']);
        } else {
            TypeOfDiseases::create(
                array_merge(
                    ['type_of_diseases' => $request->jenis_kurban],
                    ['created_by' => auth()->user()->id],
                    ['update_by' => auth()->user()->id]
                )
            );

            return
                redirect()->route('jenis-penyakit.index')->with('success', 'created successfully');
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
        $agency = TypeOfDiseases::findOrFail($id);
        return view('pages.admin.master.jenis_penyakit.edit', compact('agency'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = TypeOfDiseases::findOrFail($id);
        $user->type_of_diseases = $request->name;
        $user->save();

        return redirect()->route('jenis-penyakit.index')->with('success', 'Data Jenis Penyakit Berhasil updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

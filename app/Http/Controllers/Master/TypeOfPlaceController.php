<?php

namespace App\Http\Controllers\Master;

use App\DataTables\Master\TypeOfPlaceDataTable;
use App\Http\Controllers\Controller;
use App\Models\Master\TypeOfPlace;
use Illuminate\Http\Request;
use ResponseFormatter;

class TypeOfPlaceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(TypeOfPlaceDataTable $typeOfPlace)
    {
        return $typeOfPlace->render('pages.admin.master.jenis_tempat_pemotongan.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.admin.master.jenis_tempat_pemotongan.create');
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
            $data = TypeOfPlace::findOrFail($request->id);
            $data->update(
                array_merge(
                    ['type_of_place' => $request->jenis_kurban],
                    ['update_by' => auth()->user()->id]
                )
            );

            return response()->json(['success' => ' updated successfully']);
        } else {
            TypeOfPlace::create(
                array_merge(
                    ['type_of_place' => $request->jenis_kurban],
                    ['created_by' => auth()->user()->id],
                    ['update_by' => auth()->user()->id]
                )
            );

            return
                redirect()->route('jenis-tempat.index')->with('success', 'created successfully');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(TypeOfPlace $typeOfPlace)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TypeOfPlace $typeOfPlace)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TypeOfPlace $typeOfPlace)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TypeOfPlace $typeOfPlace)
    {
        //
    }
}

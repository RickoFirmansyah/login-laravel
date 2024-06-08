<?php

namespace App\Http\Controllers;

use ResponseFormatter;
use Illuminate\Http\Request;
use App\Models\SlaughteringPlace;
use App\Http\Controllers\Controller;
use App\Models\TypeOfPlace as ModelsTypeOfPlace;
use App\Models\Master\Kecamatan as ModelsKecamatan;
use App\Models\Master\Kelurahan as ModelsKelurahan;
use App\DataTables\Pokok\SlaughteringPlaceDataTable;


class SlaughteringPlaceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(SlaughteringPlaceDataTable $dataTable)
    {
        $slaughteringPlaces = SlaughteringPlace::all(['latitude', 'longitude', 'cutting_place']);
        return $dataTable->render('pages.admin.data-pokok.tempat-pemotongan.index', compact('slaughteringPlaces'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $typeOfPlace = ModelsTypeOfPlace::all();
        $kecamatan = ModelsKecamatan::pluck('nama', 'id');
        $kelurahan = ModelsKelurahan::all();

        return view('pages.admin.data-pokok.tempat-pemotongan.create', compact('typeOfPlace', 'kecamatan', 'kelurahan'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'latitude' => 'required',
            'longitude' => 'required',
            'type_of_place_id' => 'required',
            'kecamatan_id' => 'required',
            'kelurahan_id' => 'required',
            'cutting_place' => 'required',
        ]);

        $requestData = $request->all();
        $requestData['provinsi_id'] = 15;
        $requestData['kabupaten_id'] = 5;

        $requestData['created_by'] = auth()->user()->id;
        $requestData['update_by'] = auth()->user()->id;

        // Simpan data ke dalam database
        SlaughteringPlace::create($requestData);

        return redirect('/admin/tempat-pemotongan')->with('success', 'Tempat pemotongan berhasil ditambahkan');
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
    public function edit($id)
    {
        $typeOfPlace = ModelsTypeOfPlace::all();
        $kecamatan = ModelsKecamatan::pluck('nama', 'id');
        $kelurahan = ModelsKelurahan::all();
        $slaughteringPlace = SlaughteringPlace::findOrFail($id);
        return view('pages.admin.data-pokok.tempat-pemotongan.edit', compact('typeOfPlace', 'kecamatan', 'kelurahan', 
        'slaughteringPlace'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SlaughteringPlace $slaughteringPlace)
    {
        $request->validate([
            'latitude' => 'required',
            'longitude' => 'required',
            'type_of_place_id' => 'required',
            'kecamatan_id' => 'required',
            'kelurahan_id' => 'required',
            'cutting_place' => 'required',
        ]);

        $requestData = $request->all();
        $requestData['provinsi_id'] = 15;
        $requestData['kabupaten_id'] = 5;

        $requestData['created_by'] = auth()->user()->id;
        $requestData['update_by'] = auth()->user()->id;
        $slaughteringPlace = SlaughteringPlace::findOrFail($request->id);
        if ($slaughteringPlace->update($requestData)) {
            return redirect('/admin/tempat-pemotongan')->with('success', 'Tempat pemotongan berhasil diubah');
        } else{
            return redirect('/admin/tempat-pemotongan')->with('success', 'Tempat pemotongan gagal diubah');
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SlaughteringPlace $slaughteringPlace, $id)
    {
        $slaughteringPlace = SlaughteringPlace::findOrFail($id);
        if ($slaughteringPlace->delete()) {
            return ResponseFormatter::created('Data berhasil dihapus');
        } else {
            return ResponseFormatter::created('Gagal menghapus data');    
        }
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Panduan;
use App\Http\Controllers\Controller;
use App\DataTables\Pokok\PanduanDataTable;
use App\Models\Master\KabupatenKota;
use App\Models\Master\Kecamatan;
use App\Models\Master\Kelurahan;
use App\Models\Master\Provinsi;
use App\Models\TypeOfPlace;
use Illuminate\Support\Facades\DB;


class PanduanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(PanduanDataTable $dataTable)
    {
        $Panduans = Panduan::all(['latitude', 'longitude', 'cutting_place']);
        return $dataTable->render('pages.admin.map-pemotongan.index', compact('Panduans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $provinsi = Provinsi::all();
        $kabupatenKota = KabupatenKota::all();
        $kecamatan = Kecamatan::all();
        $kelurahan = Kelurahan::all();
        $tempatType = TypeOfPlace::all();

        return view('pages.admin.map-pemotongan.create',compact('provinsi', 'kabupatenKota', 'kecamatan', 'kelurahan','tempatType'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $StoreTempatPemotonganRequest = new Panduan();
        $StoreTempatPemotonganRequest->user_id = Auth::id();
        $StoreTempatPemotonganRequest->type_of_place_id = $request->typeOfPlace;
        $StoreTempatPemotonganRequest->cutting_place = $request->nama_tempat;
        $StoreTempatPemotonganRequest->address = $request->alamat_lengkap;
        $StoreTempatPemotonganRequest->provinsi_id = $request->provinsi;
        $StoreTempatPemotonganRequest->kabupaten_id= $request->kabupatenKota;
        $StoreTempatPemotonganRequest->kecamatan_id = $request->kecamatan;
        $StoreTempatPemotonganRequest->kelurahan_id = $request->kelurahan;
        $StoreTempatPemotonganRequest->latitude = $request->latitude;
        $StoreTempatPemotonganRequest->longitude = $request->longtitude;
        $StoreTempatPemotonganRequest->created_by = Auth::id();
        $StoreTempatPemotonganRequest->update_by = Auth::id();
        $StoreTempatPemotonganRequest->save();

        // return response()->json(['url' => route('admin.data-pokok.tempat-pemotongan.index'),'pesan' => 'Tempat Pemotongan berhasil dibuat.' ]);
        return redirect()->route('admin.data-pokok.tempat-pemotongan.index')->with('success', 'Tempat Pemotongan '. 'created successfully');
    
    }

    /**
     * Display the specified resource.
     */
    public function show(Panduan $Panduan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Panduan $Panduan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Panduan $Panduan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $tempatPemotongan = Panduan::find($id);
        Panduan::destroy($tempatPemotongan->id);

        return redirect()->route('admin.data-pokok.tempat-pemotongan.index')->with('success', 'Tempat Pemotongan '. 'delete successfully');
    }


    public function getKabupaten($provinsi)
    {
        $getProvinsi = Provinsi::find($provinsi);
        $kabupaten = KabupatenKota::where('provinsi_id', $getProvinsi->kode)->get();
        return response()->json($kabupaten);
    }

    public function getKecamatan($kabupaten)
    {
        $getKabupaten = KabupatenKota::find($kabupaten);
        $kecamatan = Kecamatan::where('provinsi_id', $getKabupaten->provinsi_id)->orderBy('nama','asc')->get();
        return response()->json($kecamatan);
    }

    public function getKelurahan($kecamatan)
    {
        $getKecamatan = Kecamatan::find($kecamatan);
        $kelurahan = Kelurahan::where('kecamatan_id', $getKecamatan->kode)->orderBy('nama','asc')->get();
        return response()->json($kelurahan);
    }
}

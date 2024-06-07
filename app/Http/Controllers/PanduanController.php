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
use ResponseFormatter;

class PanduanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(PanduanDataTable $dataTable)
    {
        $Panduans = Panduan::all();
        return $dataTable->render('pages.admin.panduan.index', compact('Panduans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $provinsi = Provinsi::all();
        // $kabupatenKota = KabupatenKota::all();
        // $kecamatan = Kecamatan::all();
        // $kelurahan = Kelurahan::all();
        // $tempatType = TypeOfPlace::all();

        return view('pages.admin.panduan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $StoreTempatPemotonganRequest = new Panduan();
        $StoreTempatPemotonganRequest->title = $request->title;
        $StoreTempatPemotonganRequest->numbers = $request->numbers;
        $StoreTempatPemotonganRequest->description = $request->description;
        $StoreTempatPemotonganRequest->created_by = Auth::id();
        $StoreTempatPemotonganRequest->update_by = Auth::id();
        $StoreTempatPemotonganRequest->save();

        // return response()->json(['url' => route('admin.data-pokok.panduan.index'),'pesan' => 'Tempat Pemotongan berhasil dibuat.' ]);
        return redirect()->route('admin.data-pokok.panduan.index')->with('success', 'Panduan '. 'created successfully');
    
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
    public function edit($id)
    {
        //
        $panduan = Panduan::findOrFail($id);
        return view('pages.admin.panduan.edit', compact('panduan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        $panduan = Panduan::findOrFail($id);
        $panduan->title = $request->title;
        $panduan->numbers = $request->numbers;
        $panduan->description = $request->description;
        $panduan->created_by = Auth::id();
        $panduan->update_by = Auth::id();
        $panduan->save();

        return redirect()->route('admin.data-pokok.panduan.index')->with('success', 'Panduan '. 'updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $tempatPemotongan = Panduan::find($id);
        Panduan::destroy($tempatPemotongan->id);

        return ResponseFormatter::success('Panduan berhasil dihapus');
        // return redirect()->route('admin.data-pokok.panduan.index')->with('success', 'Panduan '. 'delete successfully');
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

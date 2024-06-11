<?php

namespace App\Http\Controllers;

use App\Models\TypeOfPlace;
use Illuminate\Http\Request;
use App\Models\Master\Kecamatan;
use App\Models\Master\Kelurahan;
use App\Models\SlaughteringPlace;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Log;
use App\DataTables\Map\MapDataTable;

class MapController extends Controller
{
    // public function index(MapDataTable $dataTable, Request $request)
    // {
    //     $query = SlaughteringPlace::query();

    //     if ($request->filled('kecamatan_id')) {
    //         $query->where('kecamatan_id', $request->kecamatan_id);
    //     }

    //     if ($request->filled('kelurahan_id')) {
    //         $query->where('kelurahan_id', $request->kelurahan_id);
    //     }

    //     $slaughteringPlaces = $query->get(['latitude', 'longitude', 'cutting_place']);
    //     $kecamatans = Kecamatan::where('kabupaten_kota_id', 5)->get();

    //     return $dataTable->with([
    //             'kecamatan_id' => $request->kecamatan_id,
    //             'kelurahan_id' => $request->kelurahan_id
    //         ])
    //         ->render('pages.admin.map-pemotongan.index', compact('slaughteringPlaces', 'kecamatans'));
    // }

//     public function index(MapDataTable $dataTable, Request $request)
// {
//     $query = SlaughteringPlace::query();

//     if ($request->filled('kecamatan_id')) {
//         $query->where('kecamatan_id', $request->kecamatan_id);
//     }

//     if ($request->filled('kelurahan_id')) {
//         $query->where('kelurahan_id', $request->kelurahan_id);
//     }

    // $slaughteringPlaces = $query->get(['latitude', 'longitude', 'cutting_place']);
    
    // $kecamatans = Kecamatan::where('kabupaten_kota_id', 5)->get();

    // if ($request->ajax()) {
    //     return response()->json(['slaughteringPlaces' => $slaughteringPlaces]);
    // }

//     return $dataTable->with([
//             'kecamatan_id' => $request->kecamatan_id,
//             'kelurahan_id' => $request->kelurahan_id
//         ])
//         ->render('pages.admin.map-pemotongan.index', compact('slaughteringPlaces', 'kecamatans'));
// }


// public function index(MapDataTable $dataTable, Request $request)
// {
//     $query = SlaughteringPlace::query()->with(['kelurahan', 'kecamatan', 'user']);

//     if ($request->filled('kecamatan_id')) {
//         $query->where('kecamatan_id', $request->kecamatan_id);
//     }

//     if ($request->filled('kelurahan_id')) {
//         $query->where('kelurahan_id', $request->kelurahan_id);
//     }

//     $slaughteringPlaces = $query->get([
//         'latitude',
//         'longitude',
//         'cutting_place',
//         'kelurahan.nama', // gunakan relasi untuk mengambil nama kelurahan
//         'kecamatan.nama', // gunakan relasi untuk mengambil nama kecamatan
//         'user.name as nama_petugas', // gunakan relasi untuk mengambil nama petugas
//         'user.email' // gunakan relasi untuk mengambil email
//     ]);

//     $kecamatans = Kecamatan::where('kabupaten_kota_id', 5)->get();

//     if ($request->ajax()) {
//         return response()->json(['slaughteringPlaces' => $slaughteringPlaces]);
//     }

//     return $dataTable->with([
//         'kecamatan_id' => $request->kecamatan_id,
//         'kelurahan_id' => $request->kelurahan_id
//     ])->render('pages.admin.map-pemotongan.index', compact('slaughteringPlaces', 'kecamatans'));
// }
public function index(MapDataTable $dataTable, Request $request)
{
    $query = SlaughteringPlace::with(['kelurahan', 'kecamatan', 'user']);

    if ($request->filled('kecamatan_id')) {
        $query->where('kecamatan_id', $request->kecamatan_id);
    }

    if ($request->filled('kelurahan_id')) {
        $query->where('kelurahan_id', $request->kelurahan_id);
    }

    $slaughteringPlaces = $query->get();
    $kecamatans = Kecamatan::where('kabupaten_kota_id', 5)->get();

    Log::info('SlaughteringPlaces:', $slaughteringPlaces->toArray());

    // Handle AJAX request for fetching slaughtering places
    if ($request->ajax() && ($request->has('kecamatan_id') || $request->has('kelurahan_id'))) {
        $mapData = $slaughteringPlaces->map(function($place) {
            return [
                'latitude' => $place->latitude,
                'longitude' => $place->longitude,
                'cutting_place' => $place->cutting_place,
                'kelurahan_nama' => $place->kelurahan->nama,
                'kecamatan_nama' => $place->kecamatan->nama,
                'nama_petugas' => $place->user->name,
                'email_petugas' => $place->user->email,
            ];
        });

        Log::info('Map Data:', $mapData->toArray());

        return response()->json([
            'slaughteringPlaces' => $mapData,
            'dataTable' => $dataTable->with([
                'kecamatan_id' => $request->kecamatan_id,
                'kelurahan_id' => $request->kelurahan_id
            ])->ajax()
        ]);
    }

    return $dataTable->with([
        'kecamatan_id' => $request->kecamatan_id,
        'kelurahan_id' => $request->kelurahan_id
    ])->render('pages.admin.map-pemotongan.index', compact('slaughteringPlaces', 'kecamatans'));
}




    public function getKelurahans(Request $request)
    {
        $kecamatanId = $request->get('kecamatan_id');
        // Log::info('Selected Kecamatan ID: ' . $kecamatanId);
        $kelurahans = Kelurahan::where('kecamatan_id', $kecamatanId)->get();
        // Log::info('Fetched Kelurahans: ' . $kelurahans->toJson());
        return response()->json(['kelurahans' => $kelurahans]);
    }

    public function create()
    {
        $typeOfPlace = TypeOfPlace::all();
        $kecamatan = Kecamatan::pluck('nama', 'id');
        $kelurahan = Kelurahan::all();

        return view('pages.admin.map-pemotongan.create', compact('typeOfPlace', 'kecamatan', 'kelurahan'));
    }

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

        return redirect('/admin/map-pemotongan')->with('success', 'Tempat pemotongan berhasil ditambahkan');
    }

    public function edit($id)
    {
        $typeOfPlace = TypeOfPlace::all();
        $kecamatan = Kecamatan::pluck('nama', 'id');
        $kelurahan = Kelurahan::all();
        $slaughteringPlace = SlaughteringPlace::findOrFail($id);
        return view('pages.admin.map-pemotongan.edit', compact('typeOfPlace', 'kecamatan', 'kelurahan', 
        'slaughteringPlace'));
    }
    
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
            return redirect('/admin/map-pemotongan')->with('success', 'Tempat pemotongan berhasil diubah');
        } else{
            return redirect('/admin/map-pemotongan')->with('success', 'Tempat pemotongan gagal diubah');
        }
    }

}

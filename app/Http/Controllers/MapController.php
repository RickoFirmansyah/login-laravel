<?php

namespace App\Http\Controllers;

use App\DataTables\Map\SlaughteringPlaceDataTable;
use App\Models\Master\Kecamatan;
use App\Models\Master\Kelurahan;
use App\Models\SlaughteringPlace;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class MapController extends Controller
{
    public function index(SlaughteringPlaceDataTable $dataTable, Request $request)
    {
        $query = SlaughteringPlace::query();

        if ($request->filled('kecamatan_id')) {
            $query->where('kecamatan_id', $request->kecamatan_id);
        }

        if ($request->filled('kelurahan_id')) {
            $query->where('kelurahan_id', $request->kelurahan_id);
        }

        $slaughteringPlaces = $query->get(['latitude', 'longitude', 'cutting_place']);
        $kecamatans = Kecamatan::where('kabupaten_kota_id', 5)->get(); // Filter kecamatan sesuai dengan Kabupaten Blitar

        return $dataTable->with(['kecamatan_id' => $request->kecamatan_id, 'kelurahan_id' => $request->kelurahan_id])
                        ->render('pages.admin.map-pemotongan.index', compact('slaughteringPlaces', 'kecamatans'));
    }



    // public function getKelurahans(Request $request)
    // {
    //     $kecamatanId = $request->get('kecamatan_id');
    //     $kelurahans = Kelurahan::where('kecamatan_id', $kecamatanId)->get();
    //     return response()->json(['kelurahans' => $kelurahans]);
    // }
    
    public function getKelurahans(Request $request)
    {
        $kecamatanId = $request->get('kecamatan_id');
        Log::info('Selected Kecamatan ID: ' . $kecamatanId);
        $kelurahans = Kelurahan::where('kecamatan_id', $kecamatanId)->get();
        Log::info('Fetched Kelurahans: ' . $kelurahans->toJson());
        return response()->json(['kelurahans' => $kelurahans]);
    }

}

<?php

namespace App\Http\Controllers;

use App\Models\Documentation;
use App\Models\Master\Kecamatan;
use App\Models\Master\Kelurahan;
use App\Models\SlaughteringPlace;
use Illuminate\Http\Request;

class DocumentationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Documentation::paginate(12);
        $kecamatans = Kecamatan::where('kabupaten_kota_id', 5)->get();

        return view('pages.admin.dokumentasi.index', [
            'items' => $items,
            'kecamatans' => $kecamatans,
        ]);
    }


    public function filterDesa($kecamatanId)
    {
        $desas = Kelurahan::where('kecamatan_id', $kecamatanId)->get();
        return response()->json($desas);
    }

    public function filterTempat($kelurahanId)
    {
        $tempats = SlaughteringPlace::where('kelurahan_id', $kelurahanId)->get(['id', 'cutting_place']);
        return response()->json($tempats);
    }

    public function filterPhotos(Request $request)
    {
        $query = Documentation::query();

        if ($request->kecamatan) {
            $query->whereHas('qurbanReport.slaughteringPlace', function ($q) use ($request) {
                $q->whereIn('kecamatan_id', explode(',', $request->kecamatan));
            });
        }

        if ($request->desa) {
            $query->whereHas('qurbanReport.slaughteringPlace', function ($q) use ($request) {
                $q->whereIn('kelurahan_id', explode(',', $request->desa));
            });
        }

        if ($request->tempat) {
            $query->whereHas('qurbanReport.slaughteringPlace', function ($q) use ($request) {
                $q->whereIn('cutting_place', explode(',', $request->tempat));
            });
        }

        $photos = $query->get();

        return response()->json($photos);
    }


    
    public function store(Request $request)
    {
        $request->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'caption' => 'required|string|max:255',
        ]);

        $doc = new Documentation;
        $doc->qurban_report_id = 1;
        $doc->caption = $request->caption;
        $doc->created_by = auth()->user()->id;
        $doc->updated_by = auth()->user()->id;

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('assets/images/documentations'), $filename);
            $doc->photo = $filename;
        }

        $doc->save();

        // dd($doc); // Debugging, periksa apakah data sudah benar sebelum disimpan

        return redirect()->route('pages.admin.dokumentasi.index')->with('success', 'Foto berhasil ditambahkan');
    }


    /**
     * Display the specified resource.
     */
    public function show(Documentation $documentation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Documentation $documentation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Documentation $documentation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Documentation $documentation)
    {
        //
    }
}

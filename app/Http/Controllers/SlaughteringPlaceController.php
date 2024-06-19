<?php

namespace App\Http\Controllers;

use ResponseFormatter;
use Illuminate\Http\Request;
use App\Models\SlaughteringPlace;
use App\Http\Controllers\Controller;
use App\Models\Master\TypeOfPlace as ModelsTypeOfPlace;
use App\Models\Master\Kecamatan as ModelsKecamatan;
use App\Models\Master\Kelurahan as ModelsKelurahan;
use App\DataTables\Pokok\SlaughteringPlaceDataTable;
use PhpOffice\PhpSpreadsheet\IOFactory;


class SlaughteringPlaceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(SlaughteringPlaceDataTable $dataTable)
    {
        $slaughteringPlaces = SlaughteringPlace::with(['kecamatan', 'kelurahan'])->get(['latitude', 'longitude', 'cutting_place']);
        return $dataTable->render('pages.admin.data-pokok.tempat-pemotongan.index', compact('slaughteringPlaces'));
    }

    public function kecamatan()
    {
        return $this->belongsTo(ModelsKecamatan::class, 'kecamatan_id');
    }

    public function kelurahan()
    {
        return $this->belongsTo(ModelsKelurahan::class, 'kelurahan_id');
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
        return view('pages.admin.data-pokok.tempat-pemotongan.edit', compact(
            'typeOfPlace',
            'kecamatan',
            'kelurahan',
            'slaughteringPlace'
        ));
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
        } else {
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

    public function import(Request $request)
    {
        $file = $request->file('file');
        // return $file;
        $spreadsheet = IOFactory::load($file->getPathName());
        $worksheet = $spreadsheet->getActiveSheet();

        $data = []; // Inisialisasi array di luar loop

        $highestRow = $worksheet->getHighestRow();
        $highestColumn = $worksheet->getHighestColumn();

        for ($row = 2; $row <= $highestRow; $row++) { // Mulai dari baris ketiga
            $rowData = [];
            for ($col = 'A'; $col <= $highestColumn; $col++) {
                $cell = $worksheet->getCell($col . $row);
                $value = $cell->getValue();
                $rowData[] = $value !== null ? trim($value) : ''; // Pastikan nilai tidak null dan hapus ruang putih
            }
            // Tambahkan hanya jika baris tidak kosong
            if (!empty(array_filter($rowData))) {
                $data[] = $rowData; // Tambahkan setiap baris ke dalam array
            }
            $slaughteringPlace = new SlaughteringPlace();
            $slaughteringPlace->cutting_place = $rowData[1];
            $slaughteringPlace->address = $rowData[2];
            $slaughteringPlace->type_of_place_id = 2;
            $slaughteringPlace->provinsi_id = 15;
            
            $kecamatan = ModelsKecamatan::where('nama', $rowData[5])->first()->id ?? 1;
            $slaughteringPlace->kecamatan_id = $kecamatan;
            $slaughteringPlace->kabupaten_id = 5;
            $slaughteringPlace->kelurahan_id = 5;
            $slaughteringPlace->kelurahan_id = 5;

            $slaughteringPlace->latitude = '-8.07300100';
            $slaughteringPlace->longitude = '112.05370';

            $slaughteringPlace->user_id = auth()->user()->id;
            $slaughteringPlace->created_by = auth()->user()->id;
            $slaughteringPlace->update_by = auth()->user()->id;
            $slaughteringPlace->save();
        }
        return ResponseFormatter::created('Data berhasil diimport');
        // return redirect('/admin/tempat-pemotongan')->with('success', 'Tempat pemotongan berhasil diimport');
    }
}

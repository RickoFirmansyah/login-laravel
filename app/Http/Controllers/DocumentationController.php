<?php

namespace App\Http\Controllers;

use App\Models\Documentation;
use App\Models\Master\Kecamatan;
use App\Models\Master\Kelurahan;
use App\Models\SlaughteringPlace;
use Illuminate\Http\Request;

class DocumentationController extends Controller
{
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
        $doc->qurban_report_id = 1; // Change this to the correct report ID if necessary
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

        return redirect()->route('dokumentasi.index')->with('success', 'Foto berhasil ditambahkan');
    }

    public function destroy($id)
    {
        $documentation = Documentation::find($id);
        if ($documentation) {
            // Delete the photo file from the server
            $photoPath = public_path('assets/images/documentations/' . $documentation->photo);
            if (file_exists($photoPath)) {
                unlink($photoPath);
            }
            // Delete the record from the database
            $documentation->delete();
            return redirect()->route('dokumentasi.index')->with('success', 'Foto berhasil dihapus');
        }
        return redirect()->route('dokumentasi.index')->with('error', 'Foto tidak ditemukan');
    }
    // public function destroy($id)
    // {
    //     $documentation = Documentation::find($id);
    //     if ($documentation) {
    //         // Delete the photo file from the server
    //         $photoPath = public_path('assets/images/documentations/' . $documentation->photo);
    //         if (file_exists($photoPath)) {
    //             unlink($photoPath);
    //         }
    //         // Delete the record from the database
    //         $documentation->delete();
    //         return response()->json(['success' => true]);
    //     }
    //     return response()->json(['success' => false, 'message' => 'Foto tidak ditemukan']);
    // }

}

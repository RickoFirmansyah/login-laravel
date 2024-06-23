<?php

namespace App\Http\Controllers;

use App\Models\QurbanReport;
use Illuminate\Http\Request;
use App\Models\Master\TypeOfQurban;
use App\Http\Controllers\Controller;
use App\Models\Documentation;
use App\Models\QurbanData;

class PelaporanPemantauanController extends Controller
{
    public function index()
    {
        $monitoringOfficers = QurbanReport::where('monitoring_officer_id', auth()->user()->monitoringOfficer->id)
            ->withCount('qurbanData') // Menghitung jumlah qurban data untuk setiap report
            ->get();
        
        return view('pages.admin.pelaporan-pemantauan.index', compact('monitoringOfficers'));
    }

    public function create()
    {
        $qurban=TypeOfQurban::all();
        $monitoringOfficers = QurbanReport::where('monitoring_officer_id',auth()->user()->monitoringOfficer->id)->get();
        // dd($monitoringOfficers);
        return view('pages.admin.pelaporan-pemantauan.create',compact('qurban','monitoringOfficers'));
    }
    
    public function up_photo()
    {
        $monitoringOfficers = QurbanReport::where('monitoring_officer_id',auth()->user()->monitoringOfficer->id)->get();
        return view('pages.admin.pelaporan-pemantauan.up_photo',compact('monitoringOfficers'));
    }

    function store(Request $request)  {

        $tugas = QurbanData::create($request->except(['token', 'submit']));
        // $tugas->qurban_report_id = 14;
        $tugas->save();


        if ($tugas->save()) {
            return redirect('/admin/laporan-pemantauan')->with('tugas', 'Data berhasil dikirim');
        };
    }

    public function store_photo(Request $request)
    {
        $request->validate([
            'photo' => 'required|file|mimes:jpeg,png,jpg,gif|max:2048',
            'caption' => 'nullable|string|max:255',
        ]);

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $filename = $file->getClientOriginalName();
            $file->move(public_path('assets/images/documentations'), $filename);

            $tugas = Documentation::create($request->except(['_token', 'submit']));
            $tugas->photo = $filename;
            $tugas->save();

            return redirect('/admin/laporan-pemantauan')->with('tugas', 'Dokumentasi berhasil dikirim');
        } else {
            return redirect()->back()->with('error', 'Foto tidak ditemukan');
        }
    }

    
}

<?php

namespace App\Http\Controllers;

use App\Models\User;
use ResponseFormatter;
use Illuminate\Http\Request;
use App\Models\PetugasPemantauan;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\DataTables\Pokok\PetugasPemantauanDataTable;

class PetugasPemantauanController extends Controller
{
    public function index(PetugasPemantauanDataTable $dataTable)
    {
        return $dataTable->render('pages.admin.petugas-pemantauan.index');
    }

    public function create(){
        $user = User::all();
        return view('pages/admin/petugas-pemantauan/create',compact('user'));
    }
    
    public function store(Request $request){
        //    dd($request);
        $request->validate([
            'user_id' => 'required',
            'gender' => 'required',
            'phone_number' => 'required|digits:12',
            'address' => 'required',
            'name' => 'required',
        ], [
            'user_id.required' => 'Kolom user harus diisi.',
            'gender.required' => 'Kolom gender harus diisi.',
            'phone_number.required' => 'Kolom no telepon harus diisi.',
            'address.required' => 'Kolom alamat harus diisi.',
            'name.required' => 'Kolom nama harus diisi.',
            'phone_number.digit' => 'kolom nomor telepon harus berisi 12 digit angka'
        ]);
        $petugas = new PetugasPemantauan();
        $petugas->user_id = $request->user_id;
        $petugas->name = $request->name;
        $petugas->gender = $request->gender;
        $petugas->address = $request->address;
        $petugas->phone_number = $request->phone_number;
        $petugas->created_by = auth()->user()->name;
        $petugas->update_by = auth()->user()->name;

        if ($petugas->save()) {
            return redirect()->route('petugas-pemantauan.index')->with('success', 'Data Petugas Berhasil Ditambahkan');
        } else {
            return redirect()->route('petugas-pemantauan.index')->with('error', 'Gagal Menambahkan Data Petugas');
        } 
    }
    public function edit($id)
    {
        $user = User::all();
        $petugas = PetugasPemantauan::findOrFail($id);
        return view('pages.admin.petugas-pemantauan.edit', compact('user','petugas'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'user_id' => 'required',
            'gender' => 'required',
            'phone_number' => 'required|digits:12',
            'address' => 'required',
            'name' => 'required',
        ], [
            'user_id.required' => 'Kolom user harus diisi.',
            'gender.required' => 'Kolom gender harus diisi.',
            'phone_number.required' => 'Kolom no telepon harus diisi.',
            'address.required' => 'Kolom alamat harus diisi.',
            'name.required' => 'Kolom nama harus diisi.',
            'phone_number.digit' => 'kolom nomor telepon harus berisi 12 digit angka'
        ]);
        $petugas = PetugasPemantauan::findOrFail($id);
        $petugas->user_id = $request->user_id;
        $petugas->name = $request->name;
        $petugas->gender = $request->gender;
        $petugas->address = $request->address;
        $petugas->phone_number = $request->phone_number;
        $petugas->update_by = auth()->user()->name;

        if ($petugas->save()) {
            return redirect()->route('petugas-pemantauan.index')->with('success', 'Data Petugas Berhasil Diupdate');
        } else {
            return redirect()->route('petugas-pemantauan.index')->with('error', 'Gagal Mengupdate Data Petugas');
        } 
    }

    public function destroy($id)
    {
        $petugas = PetugasPemantauan::findOrFail($id);
        if ($petugas->delete()) {
            return ResponseFormatter::created('Data berhasil dihapus');
        } else {
            return ResponseFormatter::created('Gagal menghapus data');    
        }
    }
}

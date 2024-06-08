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

    public function create()
    {
        $user = User::all();
        return view('pages/admin/petugas-pemantauan/create', compact('user'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'gender' => 'required',
            'phone_number' => 'required|max:13',
            'email' => 'unique:users|nullable',
            'agency' => 'required',
            'name' => 'required',
        ], [
            'gender.required' => 'Kolom gender harus diisi.',
            'phone_number.required' => 'Kolom no telepon harus diisi.',
            'agency.required' => 'Kolom alamat harus diisi.',
            'name.required' => 'Kolom nama harus diisi.',
            'phone_number.digit' => 'Kolom nomor telepon maksimal berisi 13 digit angka',
            'email.unique' => 'Email sudah terdaftar',
        ]);

        $email = strtolower($request->email);

        if ($email == null) {
            $email = $request->phone_number . '@gmail.com';
        }

        if (User::where('email', $email)->exists()) {
            return redirect()->route('petugas-pemantauan.index')->with('error', 'Email sudah terdaftar');
        }

        if (User::where('phone_number', $request->phone_number)->exists()) {
            return redirect()->route('petugas-pemantauan.index')->with('error', 'Nomor Telepon sudah terdaftar');
        }


        $user = new User();
        $user->name = $request->name;
        $user->email = $email;
        $user->phone_number = $request->phone_number;
        $user->password = Hash::make($request->phone_number);
        $user->save();

        $petugas = new PetugasPemantauan();
        $petugas->user_id = $user->id;
        $petugas->name = $request->name;
        $petugas->gender = $request->gender;
        $petugas->agency = $request->agency;
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
        return view('pages.admin.petugas-pemantauan.edit', compact('user', 'petugas'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'user_id' => 'required',
            'gender' => 'required',
            'phone_number' => 'required|digits:12',
            'agency' => 'required',
            'name' => 'required',
        ], [
            'user_id.required' => 'Kolom user harus diisi.',
            'gender.required' => 'Kolom gender harus diisi.',
            'phone_number.required' => 'Kolom no telepon harus diisi.',
            'agency.required' => 'Kolom alamat harus diisi.',
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

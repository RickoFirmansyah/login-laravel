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
            'phone_number' => 'required|max:13|unique:users,phone_number',
            'email' => 'nullable|email|unique:users,email',
            'agency' => 'required',
            'name' => 'required',
        ], [
            'gender.required' => 'Kolom gender harus diisi.',
            'phone_number.required' => 'Kolom no telepon harus diisi.',
            'phone_number.max' => 'Kolom no telepon maksimal berisi 13 digit angka',
            'phone_number.unique' => 'Nomor Telepon sudah terdaftar',
            'email.unique' => 'Email sudah terdaftar',
            'agency.required' => 'Kolom alamat harus diisi.',
            'name.required' => 'Kolom nama harus diisi.',
        ]);


        $user = new User();
        $user->name = $request->name;
        if ($request->email) {
            $user->email = $request->email;
        } else {
            $user->email = null;
        }
        $user->phone_number = $request->phone_number;
        $user->password = Hash::make($request->phone_number);
        $user->save();

        $user->assignRole($request->role);

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

    public function view_import()
    {
        return view('pages/admin/petugas-pemantauan/import');
    }

    public function import(Request $request)
    {
        $file = $request->file('data');

        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
        $reader->setLoadSheetsOnly("data");
        $spreadsheet = $reader->load($file->getPathname());
        $sheet = $spreadsheet->getActiveSheet();
        foreach ($sheet->getRowIterator() as $row) {
            $cellIterator = $row->getCellIterator();
            $cellIterator->setIterateOnlyExistingCells(FALSE);
            $user = new User();
            $petugas = new PetugasPemantauan();
            $position = 0;
            foreach ($cellIterator as $cell) {
                if ($position === 1) {
                    $user->name = $cell->getValue();
                    $petugas->name = $cell->getValue();
                }
                if ($position === 2) {
                    $petugas->gender = $cell->getValue();
                }
                if ($position === 3) {
                    $user->password = $cell->getValue();
                    $user->phone_number = $cell->getValue();
                    $petugas->phone_number = $cell->getValue();
                }
                if ($position === 4) {
                    $user->assignRole("admin-petugas-lapangan");
                    $petugas->agency = $cell->getValue();
                }
                $petugas->created_by = auth()->user()->name;
                $petugas->update_by = auth()->user()->name;
                echo $position . ". " . $cell->getValue() . "\t";
                $position++;
            }

            $user->save();
            $petugas->user_id = $user->id;
            $petugas->save();
            echo "<br>";
        }

        // $user = new User();
        // $user->name = $request->name;
        // if ($request->email) {
        //     $user->email = $request->email;
        // } else {
        //     $user->email = null;
        // }
        // $user->phone_number = $request->phone_number;
        // $user->password = Hash::make($request->phone_number);
        // $user->save();

        // $user->assignRole($request->role);

        // $petugas = new PetugasPemantauan();
        // $petugas->user_id = $user->id;
        // $petugas->name = $request->name;
        // $petugas->gender = $request->gender;
        // $petugas->agency = $request->agency;
        // $petugas->phone_number = $request->phone_number;
        // $petugas->created_by = auth()->user()->name;
        // $petugas->update_by = auth()->user()->name;

        // if ($petugas->save()) {
        return redirect()->route('petugas-pemantauan.index')->with('success', 'Data Petugas Berhasil Ditambahkan');
        // } else {
        // return redirect()->route('petugas-pemantauan.index')->with('error', 'Gagal Menambahkan Data Petugas');
        // }
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
            'gender' => 'required',
            'phone_number' => 'required|max:13',
            'agency' => 'required',
            'name' => 'required',
        ], [
            'user_id.required' => 'Kolom user harus diisi.',
            'gender.required' => 'Kolom gender harus diisi.',
            'phone_number.required' => 'Kolom no telepon harus diisi.',
            'agency.required' => 'Kolom alamat harus diisi.',
            'name.required' => 'Kolom nama harus diisi.',
        ]);

        $user = User::findOrFail($request->user_id);
        $user->name = $request->name;
        if ($request->email) {
            $user->email = $request->email;
        } else {
            $user->email = null;
        }
        $user->phone_number = $request->phone_number;
        $user->save();

        $petugas = PetugasPemantauan::findOrFail($id);
        $petugas->user_id = $request->user_id;
        $petugas->name = $request->name;
        $petugas->gender = $request->gender;
        $petugas->agency = $request->agency;
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

        $user = User::findOrFail($petugas->user_id);
        $user->delete();

        if ($petugas->delete()) {
            return ResponseFormatter::created('Data berhasil dihapus');
        } else {
            return ResponseFormatter::created('Gagal menghapus data');
        }
    }
}
<?php

namespace App\Http\Controllers;

use App\DataTables\Master\JenisKurbanDataTable;
use App\Models\TypeOfQurban;
use Illuminate\Http\Request;
use ResponseFormatter;

class TypeOfQurbanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(JenisKurbanDataTable $jenisKurbanDataTable)
    {
        return $jenisKurbanDataTable->render('pages.admin.master.jenis_kurbanv2.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.admin.master.jenis_kurbanv2.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'jenis_kurban' => 'required',
        ]);

        // dd($request->all());

        if ($request->id != null) {
            $data = TypeOfQurban::findOrFail($request->id);
            $data->update(
                array_merge(
                    ['type_of_animal' => $request->jenis_kurban],
                    ['update_by' => auth()->user()->id]
                )
            );

            return response()->json(['success' => ' updated successfully']);
        } else {
            TypeOfQurban::create(
                array_merge(
                    ['type_of_animal' => $request->jenis_kurban],
                    ['created_by' => auth()->user()->id],
                    ['update_by' => auth()->user()->id]
                )
            );

            return
                redirect()->route('jenis-kurban.index')->with('success', 'User created successfully');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(TypeOfQurban $typeOfQurban)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $user = TypeOfQurban::findOrFail($id);
        return view('pages.admin.master.jenis_kurbanv2.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $user = TypeOfQurban::findOrFail($id);
        $user->type_of_animal = $request->name;
        $user->save();

        return redirect()->route('jenis-kurban.index')->with('success', 'Data Kurban Berhasil updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $provinsi = TypeOfQurban::find($id);
        $provinsi->delete();
        return ResponseFormatter::success('User deleted successfully');
    }
}

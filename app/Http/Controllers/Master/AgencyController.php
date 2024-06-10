<?php

namespace App\Http\Controllers\Master;

use App\DataTables\Master\AgencyDataTable;
use App\Http\Controllers\Controller;
use App\Models\Master\Agency;
use Illuminate\Http\Request;
use ResponseFormatter;

class AgencyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(AgencyDataTable $agencyDataTable)
    {
        return $agencyDataTable->render('pages.admin.master.agency.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.admin.master.agency.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'jenis_kurban' => 'required',
        ]);

        if ($request->id != null) {
            $data = Agency::findOrFail($request->id);
            $data->update(
                array_merge(
                    ['name_agencies' => $request->jenis_kurban],
                    ['update_by' => auth()->user()->id]
                )
            );

            return response()->json(['success' => ' updated successfully']);
        } else {
            Agency::create(
                array_merge(
                    ['name_agencies' => $request->jenis_kurban],
                    ['created_by' => auth()->user()->id],
                    ['update_by' => auth()->user()->id]
                )
            );

            return
                redirect()->route('instansi.index')->with('success', 'created successfully');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $agency = Agency::findOrFail($id);
        return view('pages.admin.master.agency.edit', compact('agency'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = Agency::findOrFail($id);
        $user->name_agencies = $request->name;
        $user->save();

        return redirect()->route('instansi.index')->with('success', 'Data Instansi Berhasil updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $provinsi = Agency::find($id);
        $provinsi->delete();
        return ResponseFormatter::success('Deleted successfully');
    }
}
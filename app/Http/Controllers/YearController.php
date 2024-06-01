<?php

namespace App\Http\Controllers;

use App\DataTables\Master\YearDataTable;
use App\Http\Controllers\Controller;
use App\Models\Year;
use Illuminate\Http\Request;
use ResponseFormatter;

class YearController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(YearDataTable $yearDataTable)
    {
        return $yearDataTable->render('pages.admin.master.tahun.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.admin.master.tahun.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'tahun' => 'required'
        ]);

        if ($request->id != null) {
            $data = Year::findOrFail($request->id);
            $data->update(
                array_merge(
                    ['tahun' => $request->tahun],
                    ['status' => $request->status],
                    ['update_by' => auth()->user()->id]
                )
            );

            return response()->json(['success' => 'Updated successfully']);
        } else {
            Year::create(
                array_merge(
                    ['tahun' => $request->tahun],
                    ['status' => $request->status],
                    ['created_by' => auth()->user()->id],
                    ['update_by' => auth()->user()->id]
                )
            );

            return
                redirect()->route('tahun.index')->with('success', 'Created successfully');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

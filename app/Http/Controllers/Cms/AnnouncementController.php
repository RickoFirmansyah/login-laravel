<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use App\Models\Cms\Announcement;
use App\DataTables\Cms\AnnouncementDataTable;
use Illuminate\Http\Request;
use ResponseFormatter;

class AnnouncementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(AnnouncementDataTable $datatables)
    {
        return $datatables->render('pages.admin.cms.pengumuman.index');

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.admin.cms.pengumuman.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);
        $data = $request->only(['title', 'description']);
        $data['created_by'] = auth()->user()->id;
        $data['updated_by'] = auth()->user()->id;
        if(Announcement::create($data)){
            return redirect()->route('admin.cms.pengumuman.index')->with('success', 'Pengumuman Berhasil Ditambahkan');
        } else {
            return redirect()->route('admin.cms.pengumuman.index')->with('error', 'Gagal Menambahkan Pengumuman');
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
        $pengumuman = Announcement::findOrFail($id);
        return view('pages.admin.cms.pengumuman.edit', compact('pengumuman'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $pengumuman = Announcement::findOrFail($id);
        $data = $request->only(['title', 'description']);
        $data['updated_by'] = auth()->user()->id;

        if($pengumuman->update($data)){
            return redirect()->route('admin.cms.pengumuman.index')->with('success', 'Pengumuman Berhasil Diubah');
        }else{
            return redirect()->route('admin.cms.pengumuman.index')->with('error', 'Gagal Mengubah Pengumuman');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {

        try {
            $pengumuman = Announcement::findOrFail($id);
            $pengumuman->delete();

            return redirect()->route('admin.cms.pengumuman.index')->with('success', 'Pengumuman Berhasil Dihapus');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to delete Announcement: ' . $e->getMessage());
        }
    }
}

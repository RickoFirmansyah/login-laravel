<?php

namespace App\Http\Controllers\Cms;

use App\DataTables\Cms\NewsDataTable;
use App\Http\Controllers\Controller;
use App\Models\Cms\News;
use DOMDocument;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    public function index(NewsDataTable $dataTable)
    {
        return $dataTable->render('pages.admin.cms.news.index');
    }

    // public function show(){
    //     $beritas = News::all();
    //     return view('layouts.guest', compact('berita'));
    // }

    public function create(){
        return view('pages.admin.cms.news.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->only(['title', 'description']);
        $data['created_by'] = auth()->user()->id;
        $data['updated_by'] = auth()->user()->id;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $data['image'] = $imagePath;
        }

        if(News::create($data)){
            return redirect()->route('admin.cms.news.index')->with('success', 'Berita Berhasil Ditambahkan');
        } else {
            return redirect()->route('admin.cms.news.index')->with('error', 'Gagal Menambahkan Berita');
        }
    }

    public function edit($id)
    {
        $data = News::findOrFail($id);
        return view('pages.admin.cms.news.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $news = News::findOrFail($id);

        $data = $request->only(['title', 'description']);
        $data['updated_by'] = auth()->user()->id;

        if ($request->hasFile('image')) {
            // Hapus gambar lama
            if ($news->image) {
                Storage::disk('public')->delete($news->image);
            }

            // Simpan gambar baru
            $imagePath = $request->file('image')->store('images', 'public');
            $data['image'] = $imagePath;
        }

        if($news->update($data)){
            return redirect()->route('admin.cms.news.index')->with('success', 'Berita Berhasil Diubah');
        }else{
            return redirect()->route('admin.cms.news.index')->with('error', 'Gagal Mengubah Berita');
        }

        // return redirect()->route('admin.cms.news.index')->with('success', 'News updated successfully');
    }

    public function destroy($id)
    {
        try {
            $news = News::findOrFail($id);

            // Hapus gambar
            if ($news->image) {
                Storage::disk('public')->delete($news->image);
            }
            $news->delete();

            return redirect()->route('admin.cms.news.index')->with('success', 'Berita Berhasil Dihapus');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to delete news: ' . $e->getMessage());
        }
    }
}


<?php

namespace App\Http\Controllers\Cms;

use App\DataTables\Cms\NewsDataTable;
use App\Http\Controllers\Controller;
use App\Models\Cms\News;
use DOMDocument;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use ResponseFormatter;


class NewsController extends Controller
{
    public function index(NewsDataTable $dataTable)
    {
        return $dataTable->render('pages.admin.cms.news.index');
    }

    public function create(){
        return view('pages.admin.cms.news.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif',
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
            // hapus gambar lama
            if ($news->image) {
                Storage::disk('public')->delete($news->image);
            }

            // simpan gambar baru
            $imagePath = $request->file('image')->store('images', 'public');
            $data['image'] = $imagePath;
        }

        if($news->update($data)){
            return redirect()->route('admin.cms.news.index')->with('success', 'Berita Berhasil Diubah');
        }else{
            return redirect()->route('admin.cms.news.index')->with('error', 'Gagal Mengubah Berita');
        }

    }

    public function destroy($id)
    {
        try {
            $news = News::findOrFail($id);

            if ($news->image) {
                Storage::disk('public')->delete($news->image);
            }
            $news->delete();

            return ResponseFormatter::created('Data berhasil dihapus');
        } catch (\Exception) {
            return ResponseFormatter::success('News deleted successfully');
        }
    }
}


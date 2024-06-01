<?php

namespace App\Http\Controllers\Cms;

use App\DataTables\Cms\NewsDataTable;
use App\Http\Controllers\Controller;
use App\Models\Cms\News;
use DOMDocument;
use Illuminate\Http\Request;

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
            'title' => 'required',
            'description' => 'required'
        ]);

        if ($request->id != null) {
            $data = News::findOrFail($request->id);
            $data->update(
                array_merge(
                    ['title' => $request->title],
                    ['description' => $request->description],
                    ['updated_by' => auth()->user()->id]
                    )
                );

            return response()->json(['success' => 'News updated successfully']);
        } else {
            News::create(
                array_merge(
                    ['title' => $request->title],
                    ['description' => $request->description],
                    ['created_by' => auth()->user()->id],
                    ['updated_by' => auth()->user()->id]
                )
            );

            return response()->json(['success' => 'News added successfully']);
        }
    }

    public function edit($id)
    {
        $data = News::findOrFail($id);
        return view('pages.admin.cms.news.edit', compact('data'));

        // // dd($data);
        // return Response()->json($data);
    }

    public function update(Request $request, $id){
        $request->validate([
            'title' => 'required',
            'description' => 'required',

        ]);

        $news = News::findOrFail($id);
        $news->title = $request->input('title');
        $news->description = $request->input('description');
        $news->save();

        return redirect()->route('admin.cms.news.index')->with('success', 'News updated successfully');
    }


    public function destroy($id)
    {
        try {
            News::findOrFail($id)->delete();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }

        return redirect()->route('admin.cms.news.index')->with('success', 'News updated successfully');
    }
}


<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cms\News;


class NewsGuestController extends Controller
{
    public function index(){
        $berita = News::all();
        return view('pages.guest.news', compact('berita'));
    }

    public function show($id){
        $detailNews = News::findOrFail($id);
        return view('pages.guest.detail', compact('detailNews'));
    }
}

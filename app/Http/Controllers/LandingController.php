<?php

namespace App\Http\Controllers;

use App\Models\Cms\Announcement;
use Illuminate\Http\Request;
use App\Models\Cms\News;

class LandingController extends Controller
{
    public function index(){
        $news = News::all();
        $pengumuman = Announcement::all();
        return view('pages.landing.index', compact('news','pengumuman'));
    }
}

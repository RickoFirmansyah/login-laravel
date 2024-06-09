<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cms\News;

class LandingController extends Controller
{
    public function index(){
        $news = News::all();
        return view('pages.landing.index', compact('news'));
    }
}

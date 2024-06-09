<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cms\News;


class NewsGuestController extends Controller
{
    public function show($id){
        $detailNews = News::findOrFail($id);
        return view('pages.guest.detail', compact('detailNews'));
    }
}

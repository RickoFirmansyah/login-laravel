<?php

use App\Http\Controllers\Cms\NewsController;
use App\Http\Controllers\Cms\AnnouncementController;
use App\Models\Cms\Announcement;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'cms', 'as' => 'cms.'], function () {
    // Route::resource('/slideshow', SlideShowController::class)->names('slideshow');
    Route::resource('/news', NewsController::class)->names('news');
    Route::resource('/pengumuman', AnnouncementController::class)->names('pengumuman');
    // Route::resource('/announcement', AnnouncementController::class)->names('pengumuman');
    // Route::resource('/news', NewsController::class)->names('news');
    // Route::delete('/news/{id}', [NewsController::class, 'destroy'])->name('news.destroy');
    // Route::get('/news-show', [NewsController::class, 'show'])->name('show');
    // Route::resource('/document', DocumentController::class)->names('document');
});

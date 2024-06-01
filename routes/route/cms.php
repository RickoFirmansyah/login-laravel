<?php

use App\Http\Controllers\Cms\NewsController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'cms', 'as' => 'cms.'], function () {
    // Route::resource('/slideshow', SlideShowController::class)->names('slideshow');
    Route::resource('/news', NewsController::class)->names('news');
    // Route::get('/news-show', [NewsController::class, 'show'])->name('show');
    // Route::resource('/document', DocumentController::class)->names('document');
});

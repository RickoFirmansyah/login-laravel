<?php

use App\Http\Controllers\Master\KabupatenController;
use App\Http\Controllers\Master\KecamatanController;
use App\Http\Controllers\Master\ProvinsiController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'master', 'as' => 'master.'], function () {
    Route::resource('/provinsi', ProvinsiController::class)->names('provinsi')->except('create', 'show', 'update');
    Route::resource('/kabupaten', KabupatenController::class)->names('kabupaten-kota')->except('create', 'show', 'update');
    Route::resource('/kecamatan', KecamatanController::class)->names('kecamatan')->except('create', 'show', 'update');
    //jenjang
    // bobot
});
<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ImpersonateController;
use App\Http\Controllers\QurbanData2Controller;
use App\Http\Controllers\QurbanDataController;
use App\Http\Controllers\SlaughteringPlaceController;
use App\Http\Controllers\TypeOfQurbanController;
use App\Http\Controllers\User\RoleController;
use App\Http\Controllers\User\UserController;

Auth::routes();
Route::get('/end-impersonation', [ImpersonateController::class, 'leaveImpersonation'])->name('leaveImpersonation');

Route::group(['middleware' => ['auth'], 'prefix' => 'admin', 'as' => 'admin.'], function () {
    require_once __DIR__ . '/route/master.php';
    require_once __DIR__ . '/route/cms.php';
    require_once __DIR__ . '/route/setting.php';
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [HomeController::class, 'index'])->name('home');
    Route::resource('/user-list', UserController::class)->names('user-list');

    Route::resource('/map-pemotongan', SlaughteringPlaceController::class)->names('map-pemotongan');
    Route::resource('/laporan-statistik-jeniskelamin', QurbanDataController::class)->names('laporan-statistik-jeniskelamin');
    Route::resource('/laporan-statistik-penyakit', QurbanData2Controller::class)->names('laporan-statistik-penyakit');
    Route::resource('/role', RoleController::class);
    Route::put('/role/{role}/permissions', [RoleController::class, 'updatePermissions'])->name('role.permissions');
    Route::get('/impersonate/{user}', [ImpersonateController::class, 'impersonate'])->name('impersonate');
});

Route::middleware("auth")->prefix("user")->name("user.")->group(function () {
    Route::view('/dashboard', "pages.admin.dashboard")->name("dashboard");
});

Route::get('/', function () {
    return view('pages.landing.index');
});

Route::get('/defaults', function () {
    return View::make('pages.admin.dashboard.defaults');
});

// Your new content here
Route::get('/auth/passwords/email', function () {
    return view::make('auth.passwords.email');
});
// Your new content here
Route::get('/auth/passwords/reset', function () {
    return view('auth.passwords.reset');
});

Route::get('/auth/passwords/confirm', function () {
    return view('auth.passwords.confirm');
});

Route::resource('jenis-kurban', TypeOfQurbanController::class)->names('jenis-kurban');
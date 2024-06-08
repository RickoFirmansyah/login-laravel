<?php

use App\Http\Controllers\Cms\NewsController;
use App\Http\Controllers\Guest\NewsGuestController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlaceController;
use App\Http\Controllers\Master\ProvinsiController;
use App\Http\Controllers\PetugasPemantauanController;
use Illuminate\Support\Facades\View;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AssignmentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PanduanController;
use App\Http\Controllers\ImpersonateController;
use App\Http\Controllers\MapController;


use App\Http\Controllers\QurbanDataController;
use App\Http\Controllers\QurbanData2Controller;
use App\Http\Controllers\JenisHewanController;
use App\Http\Controllers\SlaughteringPlaceController;
use App\Http\Controllers\TypeOfQurbanController;
use App\Http\Controllers\User\RoleController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\YearController;
use App\Http\Controllers\MonitoringLocationsController;

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

    // PANDUAN
    Route::resource('/admin/data-pokok/panduan', PanduanController::class)->names('admin.data-pokok.panduan');

    // TEMPAT PEMOTONGAN
    Route::resource('/admin/data-pokok/tempat-pemotongan', SlaughteringPlaceController::class)->names('admin.data-pokok.tempat-pemotongan');
    Route::get('/admin/data-pokok/tempat-pemotongan/kabupaten/{provinsi}', [SlaughteringPlaceController::class, 'getKabupaten'])->name('getKabupaten');
    Route::get('/admin/data-pokok/tempat-pemotongan/kecamatan/{kabupaten}', [SlaughteringPlaceController::class, 'getKecamatan'])->name('getKecamatan');
    Route::get('/admin/data-pokok/tempat-pemotongan/kelurahan/{kecamatan}', [SlaughteringPlaceController::class, 'getKelurahan'])->name('getKelurahan');
    Route::resource('/admin/lokasi-pemotongan', MapController::class)->names('map-pemotongan');
    Route::resource('/admin/panduan', PanduanController::class)->names('admin.panduan');

    // TEMPAT PEMOTONGAN
    Route::resource('/admin/tempat-pemotongan', SlaughteringPlaceController::class)->names('admin.tempat-pemotongan');
    Route::get('/admin/tempat-pemotongan/kabupaten/{provinsi}', [SlaughteringPlaceController::class, 'getKabupaten'])->name('getKabupaten');
    Route::get('/admin/tempat-pemotongan/kecamatan/{kabupaten}', [SlaughteringPlaceController::class, 'getKecamatan'])->name('getKecamatan');
    Route::get('/admin/tempat-pemotongan/kelurahan/{kecamatan}', [SlaughteringPlaceController::class, 'getKelurahan'])->name('getKelurahan');
    Route::resource('/map-pemotongan', MapController::class)->names('map-pemotongan');

    // PETUGAS PEMANTAUAN
    Route::resource('/admin/data-pokok/petugas-pemantauan', PetugasPemantauanController::class)->names('petugas-pemantauan');


    Route::resource('/daftar-lokasi-pemantauan', MonitoringLocationsController::class)->names('daftar-lokasi-pemantauan');


    Route::resource('/laporan-statistik-jeniskelamin', QurbanDataController::class)->names('laporan-statistik-jeniskelamin');
    Route::resource('/laporan-statistik-penyakit', QurbanData2Controller::class)->names('laporan-statistik-penyakit');
    Route::resource('/laporan-statistik-jenishewan', JenisHewanController::class)->names('laporan-statistik-jenishewan');
    Route::resource('/laporan-statistik-jeniskelamin', QurbanDataController::class)->names('laporan-statistik-jeniskelamin');
    Route::resource('/laporan-statistik-penyakit', QurbanDataController::class)->names('laporan-statistik-penyakit');
    Route::resource('/laporan-statistik-jenishewan', JenisHewanController::class)->names('laporan-statistik-jenishewan');
    Route::resource('/laporan-statistik-jeniskelamin', QurbanDataController::class)->names('laporan-statistik-jeniskelamin');
    Route::resource('/laporan-statistik-penyakit', QurbanData2Controller::class)->names('laporan-statistik-penyakit');
    Route::resource('/role', RoleController::class);
    Route::put('/role/{role}/permissions', [RoleController::class, 'updatePermissions'])->name('role.permissions');
    Route::resource('/role', RoleController::class);
    Route::get('/impersonate/{user}', [ImpersonateController::class, 'impersonate'])->name('impersonate');
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.myprofile');
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
Route::resource('tahun', YearController::class)->names('tahun');

Route::resource('penugasan', AssignmentController::class);

Route::get('/penugasan', [AssignmentController::class, 'index'])->name('penugasan.index');
// Route::get('/berita', function(){
//     return view('pages.guest.news');
// });
Route::get('/berita', [NewsGuestController::class, 'index'])->name('guest.berita');
// Route::get('/show', [NewsGuestController::class, 'show'])->name('guest.show');
Route::get('/berita/{id}', [NewsGuestController::class, 'show'])->name('guest.detail');

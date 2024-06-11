<?php

use App\Http\Controllers\Master\AgencyController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LandingController;
use App\Http\Controllers\User\RoleController;
use App\Http\Controllers\Setting\MenusController;
use App\Http\Controllers\Guest\NewsGuestController;
use App\Http\Controllers\PetugasPemantauanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\AssignmentController;
use App\Http\Controllers\DocumentationController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PanduanController;
use App\Http\Controllers\JenisHewanController;
use App\Http\Controllers\QurbanDataController;
use App\Http\Controllers\ImpersonateController;
use App\Http\Controllers\MapController;

use App\Http\Controllers\QurbanData2Controller;
use App\Http\Controllers\TypeOfQurbanController;
use App\Http\Controllers\LaporanPemantauanController;
use App\Http\Controllers\SlaughteringPlaceController;
use App\Http\Controllers\Master\YearController;
use App\Http\Controllers\MonitoringLocationsController;
use App\Http\Controllers\MonitoringOfficerController;
use App\Http\Controllers\Setting\SystemSettingController;
use App\Http\Controllers\Master\TypeOfDiseasesController;
use App\Http\Controllers\Master\TypeOfPlaceController;
use App\Http\Controllers\PelaporanPemantauanController;



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


    Route::get('admin/setting/menu/icons/ref', [MenusController::class, 'iconsRef'])->name('icons.ref');
    // Route::post('/menu', [MenusController::class, 'store'])->name('menus.store');

    // PANDUAN
    Route::resource('/admin/data-pokok/panduan', PanduanController::class)->names('admin.data-pokok.panduan');

    // TEMPAT PEMOTONGAN
    Route::resource('/admin/data-pokok/tempat-pemotongan', SlaughteringPlaceController::class)->names('admin.data-pokok.tempat-pemotongan');
    Route::get('/admin/data-pokok/tempat-pemotongan/kabupaten/{provinsi}', [SlaughteringPlaceController::class, 'getKabupaten'])->name('getKabupaten');
    Route::get('/admin/data-pokok/tempat-pemotongan/kecamatan/{kabupaten}', [SlaughteringPlaceController::class, 'getKecamatan'])->name('getKecamatan');
    Route::get('/admin/data-pokok/tempat-pemotongan/kelurahan/{kecamatan}', [SlaughteringPlaceController::class, 'getKelurahan'])->name('getKelurahan');
    Route::resource('/admin/panduan', PanduanController::class)->names('admin.panduan');

    // MENU
    Route::resource('/admin/setting/menu', MenusController::class)->names('menus');

    // TEMPAT PEMOTONGAN
    Route::resource('/admin/tempat-pemotongan', SlaughteringPlaceController::class)->names('admin.tempat-pemotongan');
    Route::resource('/admin/lokasi-pemotongan', MapController::class)->names('map-pemotongan');
    Route::get('get-kelurahans', [MapController::class, 'getKelurahans'])->name('get-kelurahans');

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
    Route::resource('/admin/dokumentasi', DocumentationController::class)->names('dokumentasi');
    Route::get('/admin/dokumentasi/filter/desa/{kecamatanId}', [DocumentationController::class, 'filterDesa']);
    Route::get('/admin/dokumentasi/filter/tempat/{kelurahanId}', [DocumentationController::class, 'filterTempat']);
    Route::get('/admin/dokumentasi/filter/photos', [DocumentationController::class, 'filterPhotos']);
    Route::resource('/admin/setting/system-setting', SystemSettingController::class)->names('system');

    Route::resource('/admin/laporan-pemantauan', PelaporanPemantauanController::class)->names('laporan-pemantauan');
   
});

Route::middleware("auth")->prefix("user")->name("user.")->group(function () {
    Route::view('/dashboard', "pages.admin.dashboard")->name("dashboard");
});

Route::get('/', [LandingController::class, 'index']);

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
Route::resource('jenis-tempat', TypeOfPlaceController::class)->names('jenis-tempat');
Route::resource('jenis-penyakit', TypeOfDiseasesController::class)->names('jenis-penyakit');
Route::resource('instansi', AgencyController::class)->names('instansi');
Route::get('/export-jenis-kurban', [TypeOfQurbanController::class, 'export']);
Route::post('/import-jenis-kurban', [TypeOfQurbanController::class, 'import']);

Route::resource('tahun', YearController::class)->names('tahun');

Route::resource('penugasan', AssignmentController::class);
Route::delete('/delete-add-penugasan/{id}', [SlaughteringPlaceController::class, 'destroy']);
Route::get('/add-penugasan', [SlaughteringPlaceController::class, 'index']);
Route::get('/admin/data-pokok/penugasan', [MonitoringOfficerController::class, 'index']); // Added this line
Route::get('/admin/penugasan/add/{id}', [AssignmentController::class, 'addPenugasan'])->name('admin.penugasan.add');
Route::get('/admin/penugasan', [AssignmentController::class, 'index'])->name('admin.penugasan.index');
Route::get('/penugasan', [AssignmentController::class, 'index'])->name('penugasan.index');

// DETAIL BERITA
// Route::get('/show', [NewsGuestController::class, 'show'])->name('guest.show');
Route::get('/berita/{id}', [NewsGuestController::class, 'show'])->name('guest.detail');
Route::get('/berita', [NewsGuestController::class, 'index'])->name('guest.berita');
Route::get('/berita/{id}', [NewsGuestController::class, 'show'])->name('guest.detail');

// Your new content here
// Your new content here
Route::get('/pengaturan', function () {
    return view('pages.admin.pengaturan.index');
});
// Your new content here
// Your new content here
Route::get('/admin/setting/test', function () {
    return view('pages.admin.test.index');
});

<?php

use App\Http\Controller\Setting\MenusController;
use App\Http\Controllers\Setting\BackupScheduleController;
use App\Http\Controllers\Setting\FileManagerController;
use App\Http\Controllers\Setting\SiteSettingController;
use App\Http\Controllers\Setting\SystemSettingController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'setting', 'as' => 'setting.'], function () {
    Route::resource('/file-manager',FileManagerController::class)->names('file-manager');
    Route::get('/file-manager/download/{file}', [FileManagerController::class, 'download'])->name('file-manager.download');
    Route::resource('/site-settings',SiteSettingController::class)->names('site-settings');
    Route::resource('/system-setting', SystemSettingController::class)->names('system-setting');
    Route::resource('/backup',BackupScheduleController::class, ['parameters' => ['backup' => 'backupSchedule']])
        ->names('backup');
        // Route::resource('/menu',MenusController::class)->names('menus');
    Route::post('/backup/{backupSchedule}/run', [BackupScheduleController::class, 'run'])->name('backup.run');
    Route::get('/backup/{backup_name}/download', [BackupScheduleController::class, 'download'])->name('backup.download');
});

<?php

namespace App\Http\Controllers\Setting;

use App\DataTables\Setting\BackupScheduleDataTable;
use App\Http\Controllers\Controller;
use App\Models\Setting\BackupSchedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;

class BackupScheduleController extends Controller
{
    public function index(BackupScheduleDataTable $dataTable)
    {
        return $dataTable->render('pages.admin.setting.backup.index');
    }

    public function create()
    {
        $tableNames = DB::table('information_schema.tables')
            ->select('table_name')
            ->where('table_schema', config('database.connections.mysql.database'))
            ->pluck('TABLE_NAME')
            ->toArray();

        return view('pages.admin.setting.backup.create')->with('tableNames', $tableNames);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:backup_schedules,name',
            'frequency' => 'required|in:daily,weekly,monthly',
            'time' => 'required',
            'tables' => 'required|array',
        ]);
        $newBackupSchedule = BackupSchedule::create($validated);
        $tables = collect($request->tables)->map(function ($table) {
            return ['table_name' => $table];
        });
        $newBackupSchedule->backupTables()->createMany($tables->toArray());

        return redirect()->route('admin.setting.backup.index')->with('success', 'Backup Schedule Created');
    }

    public function show(BackupSchedule $backupSchedule)
    {
        $backupSchedule->load('backupHistories', 'backupTables');

        $tableNames = DB::table('information_schema.tables')
            ->select('table_name')
            ->where('table_schema', config('database.connections.mysql.database'))
            ->pluck('TABLE_NAME')
            ->toArray();

        $backupTables = $backupSchedule->backupTables->pluck('table_name')->toArray();

        return view('pages.admin.setting.backup.show', [
            'tableNames' => $tableNames,
            'backupSchedule' => $backupSchedule,
            'backupHistories' => $backupSchedule->backupHistories,
            'backupTables' => $backupTables,
        ]);
    }

    public function edit(BackupSchedule $backupSchedule)
    {
        $backupSchedule->load('backupTables');

        $tableNames = DB::table('information_schema.tables')
            ->select('table_name')
            ->where('table_schema', config('database.connections.mysql.database'))
            ->pluck('TABLE_NAME')
            ->toArray();

        $backupTables = $backupSchedule->backupTables->pluck('table_name')->toArray();

        return view('pages.admin.setting.backup.edit', [
            'tableNames' => $tableNames,
            'backupSchedule' => $backupSchedule,
            'backupTables' => $backupTables,
        ]);
    }

    public function update(Request $request, BackupSchedule $backupSchedule)
    {

        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:backup_schedules,name,'.$backupSchedule->id.',id',
            'frequency' => 'required|in:daily,weekly,monthly',
            'time' => 'required',
        ]);

        $backupSchedule->update($validated);

        $backupSchedule->backupTables()->delete();

        $tables = collect($request->tables)->map(function ($table) {
            return ['table_name' => $table];
        });
        $backupSchedule->backupTables()->createMany($tables->toArray());

        return redirect()->route('admin.setting.backup.index')->with('success', 'Backup Schedule Updated');
    }

    public function destroy(BackupSchedule $backupSchedule)
    {
        $backupSchedule->delete();

        return redirect()->route('admin.setting.backup.index')->with('success', 'Backup Schedule Deleted');
    }

    public function run(BackupSchedule $backupSchedule)
    {

        Artisan::call('backup:run', ['backup_name' => $backupSchedule->name]);
        if (Artisan::output() == 1) {
            $latestBackupFile = $backupSchedule->backupHistories()->latest()->first()->file_name;
            if (! $latestBackupFile) {
                return redirect()->route('admin.setting.backup.index')->with('error', 'No backup found');
            }

            return $this->download($latestBackupFile);
        }
    }

    public function download(string $fileName)
    {
        $filePath = storage_path('backup/databases/'.$fileName);

        return response()->download($filePath);
    }
}

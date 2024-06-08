<?php

namespace App\Http\Controllers\Setting;

use App\DataTables\Setting\SystemSettingDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\SystemSetting\StoreSettingRequest;
use App\Models\Setting\SystemSettingModel ;
use App\Traits\HasReference;
use ResponseFormatter;

class SystemSettingController extends Controller
{
    use HasReference;

    public function index(SystemSettingDataTable $dataTable)
    {
        return $dataTable->render('pages.admin.setting.system-setting.index');
    }

    public function create()
    {
        $systemSetting = SystemSettingModel::all();
        return view('pages.admin.setting.system-setting.create', compact('systemSetting'));
    }

    public function store(StoreSettingRequest $request)
    {
        try {
            $res = SystemSettingModel::create(array_merge(
                $request->validated(),
                ['type' => gettype($request->value)]
            ));
            return redirect()->route('system.index')->with('success', 'system created successfully');
            // return ResponseFormatter::created("System setting saved successfully", $res);
        } catch (\Exception $e) {
            return ResponseFormatter::error("Failed to add system setting", $e->getMessage(), $e->getCode());
        }
    }

    public function edit(SystemSettingModel $systemSetting)
    {
        // return response()->json($systemSetting);
        $settings = SystemSettingModel::where('id', '!=', $systemSetting->id)->get();
        return view('pages.admin.setting.system-setting.edit', compact('systemSetting', 'settings'));

    }

    public function update(StoreSettingRequest $request, SystemSettingModel $systemSetting)
    {
        // Merge validated data with the type information
        // dd($request);
        $dataToUpdate = array_merge(
            $request->validated(),
            ['type' => gettype($request->input('value'))]
        );

        // Update the system setting
        $systemSetting->updateOrFail($dataToUpdate);

        // Redirect to the system index route with a success message
        return redirect()->route('system.index')->with('success', 'System setting updated successfully');
    }


    public function destroy(SystemSettingModel $systemSetting)
    {
        try {
            $systemSetting->deleteOrFail();
            return ResponseFormatter::success("System setting deleted successfully");
        } catch (\Exception $e) {
            return ResponseFormatter::error("Failed to delete system setting", $e->getMessage(), $e->getCode());
        }
    }
}
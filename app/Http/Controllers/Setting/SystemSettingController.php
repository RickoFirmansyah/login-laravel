<?php

namespace App\Http\Controllers\Setting;

use App\DataTables\Setting\SystemSettingDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\SystemSetting\StoreSettingRequest;
use App\Models\Setting\SystemSettingModel ;
use ResponseFormatter;

class SystemSettingController extends Controller
{
    public function index(SystemSettingDataTable $dataTable)
    {
        return $dataTable->render('pages.admin.system-setting.index');
    }

    public function store(StoreSettingRequest $request)
    {
        try {
            $res = SystemSettingModel::create(array_merge(
                $request->validated(),
                ['type' => gettype($request->value)]
            ));
            return ResponseFormatter::created("System setting saved successfully", $res);
        } catch (\Exception $e) {
            return ResponseFormatter::error("Failed to add system setting", $e->getMessage(), $e->getCode());
        }
    }

    public function edit(SystemSettingModel $systemSetting)
    {
        return response()->json($systemSetting);
    }

    public function update(StoreSettingRequest $request, SystemSettingModel $systemSetting)
    {
        try {
            $systemSetting->updateOrFail(array_merge(
                $request->validated(),
                ['type' => gettype($request->value)]
            ));
            return ResponseFormatter::success("System setting updated successfully", $systemSetting);
        } catch (\Exception $e) {
            return ResponseFormatter::error("Failed to update system setting", $e->getMessage(), $e->getCode());
        }
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

<?php

namespace App\Http\Controllers\Setting;

use App\DataTables\Setting\SiteSettingDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Setting\SiteSetting\SiteSettingStoreRequest;
use App\Models\Setting\SiteSetting;

class SiteSettingController extends Controller
{
    public function index(SiteSettingDataTable $dataTable)
    {
        return $dataTable->render('pages.admin.setting.site-settings.index');
    }

    public function store(SiteSettingStoreRequest $request)
    {
        if ($request->id != null) {
            $siteSetting = SiteSetting::find($request->id);
            $siteSetting->update($request->all());

            return response()->json(['success' => 'Site setting updated successfully']);
        } else {
            SiteSetting::create($request->all());

            return response()->json(['success' => 'Site setting created successfully']);
        }
    }

    public function edit(SiteSetting $siteSetting)
    {
        return response()->json($siteSetting);
    }

    public function destroy(SiteSetting $siteSetting)
    {
        $siteSetting->delete();

        return response()->json(['success' => 'Site setting deleted successfully']);
    }
}

<?php
namespace App\Helpers;

use App\Models\Setting\SystemSettingModel;

class SystemSettingHelper
{
    public static function get($key, $default = null)
    {
        $setting = SystemSettingModel::where('name', $key)->first();
        return $setting ? $setting->value : $default;
    }
}
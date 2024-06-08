<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Setting\SystemSettingModel;

class SystemSettingSeeder extends Seeder
{
    public function run()
    {
        $settings = [
            ['name' => 'no_telp', 'value' => '(031) 843 2203', 'type' => 'string'],
            ['name' => 'email', 'value' => '0fLbZ@example.com', 'type' => 'string'],
            ['name' => 'alamat', 'value' => '>Jl. Raya Candi, Candi, Kec. Blitar, Kabupaten Blitar, Jawa Timur 66153', 'type' => 'string'],
            ['name' => 'footer', 'value' => '@disnakkanblitar', 'type' => 'string'],
        ];

        foreach ($settings as $setting) {
            SystemSettingModel::create($setting);
        }
    }
}
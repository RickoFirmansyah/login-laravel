<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            MenusSeeder::class,
            RoleSeeder::class,
            UserSeeder::class,
            PermissionsSeeder::class,
            // BackupScheduleSeeder::class,
            // BackupScheduleTablesSeeder::class,
            AccessSeeder::class,
            ProvinsiSeeder::class,
            KabupatenKotaSeeder::class,
            KecamatanSeeder::class,
            KelurahanSeeder::class,
            DataMaster::class,
            MonitoringOfficersSeeder::class,
            SystemSettingSeeder::class,
            SlaughteringPlacesSeeder::class,
            AnnouncementSeeder::class,
            NewsSeeder::class,
            MonitoringOfficersSeeder::class,
            AssignmentsSeeder::class,
            QurbanReportsSeeder::class,
            QurbanDataSeeder::class,
        ]);
    }
}
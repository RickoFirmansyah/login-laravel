<?php

namespace Database\Seeders;

use App\Models\Setting\FileManagement;
use Illuminate\Database\Seeder;

class FileManagerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        FileManagement::factory()->count(5)->create();
    }
}

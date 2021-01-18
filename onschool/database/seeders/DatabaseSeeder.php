<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Symfony\Component\Finder\Glob;

class DatabaseSeeder extends Seeder
{

    public function run()
    {
        $files = glob(public_path('uploads/images/*/*.*'));
        foreach ($files as $file) { unlink($file); }

        $this->call(RoleSeeder::class);
        $this->call(AdminSeeder::class);
        \App\Models\Admin::factory(5)->create();
        \App\Models\User::factory(20)->create();
    } // end of run

} // end of seeder

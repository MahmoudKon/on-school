<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class AdminSeeder extends Seeder
{
    public function run()
    {
        $admin = Admin::create([
            'name' => 'Super Admin',
            'email' => 'super_admin@app.com',
            'phone' => '01156455369',
            'email_verified_at' => now(),
            'password' => bcrypt(123),
            'remember_token' => Str::random(10),
        ])->attachRole('super_admin');
    } // end of run
} // end of admin seeder

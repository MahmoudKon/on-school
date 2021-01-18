<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{

    public function run()
    {
        $super_admin = Role::create([
            'name' => 'super_admin',
            'display_name' => 'super admin',
            'description' => 'this role can do anything in the project'
        ]);

        $admin = Role::create([
            'name' => 'admin',
            'display_name' => 'admin',
            'description' => 'this role can do specific tasks in the project'
        ]);
    } // end of run

} // end of role seeder

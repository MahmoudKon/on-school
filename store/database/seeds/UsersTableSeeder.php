<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        return App\Models\User::create([
            'name' => 'mohamed',
            'email' => 'mohamed@app.com',
            'image' => 'mohamed.jpg',
            'password' => bcrypt('123456'),
            'role'  => 'superadmin',
        ]);
    }
}

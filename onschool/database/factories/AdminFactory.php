<?php

namespace Database\Factories;

use App\Models\Admin;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class AdminFactory extends Factory
{
    protected $model = Admin::class;

    public function definition()
    {
        return [
            'name'              => $this->faker->unique()->name,
            'email'             => $this->faker->unique()->safeEmail,
            'phone'             => $this->faker->unique()->phoneNumber,
            'image'             => $this->faker->image(public_path('uploads/images/admins'), 640, 640, 'Admins', false),
            'email_verified_at' => now(),
            'password'          => bcrypt(123),
            'remember_token'    => Str::random(10),
        ];
    } // end of definition

} // end of factory

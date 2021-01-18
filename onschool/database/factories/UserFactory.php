<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    protected $model = User::class;

    public function definition()
    {
        return [
            'username'          => $this->faker->unique()->name(),
            'email'             => $this->faker->unique()->safeEmail,
            'phone'             => $this->faker->unique()->phoneNumber,
            'image'             => $this->faker->image(public_path('uploads/images/users'), 640, 640, 'users', false),
            'email_verified_at' => now(),
            'password'          => bcrypt(123),
            'remember_token'    => Str::random(10),
        ];
    } // end of definition

} // end of user factory

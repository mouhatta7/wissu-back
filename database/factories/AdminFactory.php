<?php
namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

class AdminFactory extends Factory
{
    public function definition()
    {
        return [
            'email' => 'admin@test.com',
            'password' => Hash::make('admin123'),
        ];
    }
}
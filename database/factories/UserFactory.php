<?php
namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class UserFactory extends Factory
{
    public function definition()
    {
        return [
            'nom' => $this->faker->lastName(),
            'prenom' => $this->faker->firstName(),
            'adresse' => $this->faker->address(),
            'telephone' => $this->faker->phoneNumber(),
        ];
    }
}
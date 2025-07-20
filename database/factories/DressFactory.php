<?php
namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class DressFactory extends Factory
{
    public function definition()
    {
        $types = ['robe', 'pantalon', 'tshirt'];
        $couleurs = ['Rouge', 'Bleu', 'Noir', 'Blanc', 'Vert'];
        $tailles = ['S', 'M', 'L', 'XL'];

        return [
            'type' => $this->faker->randomElement($types),
            'nom' => $this->faker->words(3, true),
            'prix' => $this->faker->randomFloat(2, 50, 300),
            'description' => $this->faker->sentence(),
            'image' => 'https://via.placeholder.com/300x400',
            'variantes' => [
                [
                    'couleur' => $this->faker->randomElement($couleurs),
                    'taille' => $this->faker->randomElement($tailles)
                ],
                [
                    'couleur' => $this->faker->randomElement($couleurs),
                    'taille' => $this->faker->randomElement($tailles)
                ]
            ],
        ];
    }
}
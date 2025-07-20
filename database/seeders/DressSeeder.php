<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Dress;

class DressSeeder extends Seeder
{
    public function run()
    {
        // Créer des robes spécifiques
        Dress::create([
            'type' => 'robe',
            'nom' => 'Robe de soirée satinée',
            'prix' => 199.99,
            'description' => 'Belle robe élégante pour soirée',
            'image' => 'https://via.placeholder.com/300x400',
            'variantes' => [
                ['couleur' => 'Rouge', 'taille' => 'S'],
                ['couleur' => 'Rouge', 'taille' => 'M'],
                ['couleur' => 'Bleu', 'taille' => 'L']
            ]
        ]);

        Dress::create([
            'type' => 'pantalon',
            'nom' => 'Pantalon cargo moderne',
            'prix' => 149.90,
            'description' => 'Pantalon confortable et stylé',
            'image' => 'https://via.placeholder.com/300x400',
            'variantes' => [
                ['couleur' => 'Noir', 'taille' => 'M'],
                ['couleur' => 'Vert', 'taille' => 'L']
            ]
        ]);

        Dress::create([
            'type' => 'tshirt',
            'nom' => 'T-shirt oversize unisexe',
            'prix' => 89.00,
            'description' => 'T-shirt confortable pour tous',
            'image' => 'https://via.placeholder.com/300x400',
            'variantes' => [
                ['couleur' => 'Blanc', 'taille' => 'S'],
                ['couleur' => 'Noir', 'taille' => 'M'],
                ['couleur' => 'Gris', 'taille' => 'L']
            ]
        ]);

        // Créer 10 autres robes aléatoirement
        Dress::factory(10)->create();
    }
}
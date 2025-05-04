<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Recipe;
use App\Models\User;

class RecipeSeeder extends Seeder
{
    public function run()
    {
        $user = User::first(); // Mendapatkan user pertama untuk membuat resep

        Recipe::create([
            'title' => 'Mie Goreng Spesial',
            'description' => 'Resep mie goreng spesial untuk anak kost.',
            'steps' => '1. Rebus mie. 2. Tumis bahan. 3. Campur mie.',
            'user_id' => $user->id,
            'prep_time' => 5,
            'cook_time' => 10,
            'estimated_cost' => 5000,
            'difficulty' => 'mudah',
            'image' => 'images/mie_goreng.jpg'
        ]);
    }
}

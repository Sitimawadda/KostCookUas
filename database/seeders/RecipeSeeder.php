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
            'cook_time' => 10,
            'image' => 'images/mie_goreng.jpg'
        ]);
    }
}

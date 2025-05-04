<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Ingredient;
use App\Models\Recipe;

class IngredientSeeder extends Seeder
{
    public function run()
    {
        $recipe = Recipe::first(); // Mendapatkan resep pertama untuk menambahkan bahan

        Ingredient::create([
            'recipe_id' => $recipe->id,
            'name' => 'Mie Instan',
            'quantity' => '1 bungkus'
        ]);
        
        Ingredient::create([
            'recipe_id' => $recipe->id,
            'name' => 'Bumbu Mie',
            'quantity' => '1 sachet'
        ]);
    }
}

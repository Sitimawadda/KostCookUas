<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Recipe;

class FavoriteRecipeSeeder extends Seeder
{
    public function run()
    {
        $user = User::first(); // Ambil user pertama
        $recipe = Recipe::where('title', 'Mie Goreng Spesial')->first(); // Ambil resep mie goreng

        if ($user && $recipe) {
            $user->favoriteRecipes()->syncWithoutDetaching([$recipe->id]);
        }
    }
}

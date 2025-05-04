<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Rating;
use App\Models\User;
use App\Models\Recipe;

class RatingSeeder extends Seeder
{
    public function run()
    {
        $user = User::first(); // Mendapatkan user pertama
        $recipe = Recipe::first(); // Mendapatkan resep pertama

        Rating::create([
            'user_id' => $user->id,
            'recipe_id' => $recipe->id,
            'rating' => 5,
            'comment' => 'Resep ini sangat mudah dan enak!'
        ]);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'steps', 'user_id', 'prep_time', 'cook_time', 'estimated_cost', 'difficulty', 'image'];

    // Relasi dengan User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi dengan Ingredient
    public function ingredients()
    {
        return $this->hasMany(Ingredient::class);
    }

    // Relasi dengan Rating
    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }
    public function favoritedByUsers()
{
    return $this->belongsToMany(User::class, 'recipe_user')->withTimestamps();
}

}

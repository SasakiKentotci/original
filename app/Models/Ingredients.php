<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ingredients extends Model
{
    use HasFactory;

    public function used()
    {
        return $this->belongsToMany(Ingredients::class, 'recipe_ingredient', 'ingredient_id', 'recipe_id')->withTimestamps();
    }
}

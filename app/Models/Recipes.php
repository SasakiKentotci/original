<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipes extends Model
{
    use HasFactory;
    protected $fillable = ['content'];

        public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->hasMany(Category::class);
    }

    public function usings()
    {
        return $this->belongsToMany(Ingredients::class, 'recipe_ingredient', 'recipe_id', 'ingredient_id')->withTimestamps();
    }

        public function use(int $recipe_id)
    {
        $exist = $this->is_using($recipe_id);
        $its_me = $this->id == $recipe_id;
        
        if ($exist || $its_me) {
            return false;
        } else {
            $this->using()->attach($recipe_id);
            return true;
        }
    }

    public function unuse(int $recipe_id)
    {
        $exist = $this->is_using($recipe_id);
        $its_me = $this->id == $recipe_id;
        
        if ($exist && !$its_me) {
            $this->usings()->detach($recipe_id);
            return true;
        } else {
            return false;
        }
    }

    public function is_using(int $recipe_id)
    {
        return $this->usings()->where('ingredient_id', $recipe_id)->exists();
    }
}

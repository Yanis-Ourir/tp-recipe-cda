<?php

namespace App\Repositories;

use App\Interfaces\RepositoryInterface;
use App\Models\Recipe;

class RecipeRepository implements RepositoryInterface
{
    public function all(): Array
    {
        $recipes = Recipe::all();
        return $recipes->toArray(); 
    }

    // Trouve une recette par son id
    public function findById(?int $id): Array
    {
        $recipe = Recipe::find($id);
        return $recipe->toArray();
    }
}

<?php

namespace App\Repositories;

use App\Interfaces\RepositoryInterface;
use App\Models\Ingredient;

class IngredientRepository implements RepositoryInterface {
    public function all(): Array
    {
        $ingredients = Ingredient::all();
        return $ingredients->toArray(); 
    }

    // Trouve un ingredient par son id
    public function findById(?int $id): Array
    {
        $ingredient = Ingredient::find($id);
        return $ingredient->toArray();
    }

}
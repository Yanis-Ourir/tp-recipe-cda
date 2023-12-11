<?php

namespace App\Repositories;

use App\Interfaces\IRepository;
use App\Models\Ingredient;
use App\Models\Recipe;
use Illuminate\Http\Request;

class RecipeRepository implements IRepository
{
    public function allRecipe(): Array
    {
        $recipes = Recipe::all();
        return $recipes->toArray(); 
    }

    // Trouve une recette par son ID
    public function findRecipeById(?int $id): Array
    {
        $recipe = Recipe::find($id);
        $ingredients = [];
        foreach ($recipe->ingredients as $ingredient) {
            $ingredients[] = $ingredient;
        }
        return $recipe->toArray();
    }

    // ADD recette
    public function addRecipe(array $content): Array //  Prends un tableau;
    {
   
        $ingredients = $content['ingredients'];
       
        $recipe = Recipe::create([
            'name' => $content['name'],
            'preparationTime' => $content['preparationTime'],
            'cookingTime' => $content['cookingTime'],
            'serves' => $content['serves']  
        ]);

        foreach ($ingredients as $ingredient) {
            $ingredientName[] = Ingredient::firstOrCreate(['name' => $ingredient]);
        }


        // syncWith https://stackoverflow.com/questions/24702640/laravel-save-update-many-to-many-relationship

        $recipe->ingredients()->saveMany($ingredientName);

        return $recipe->toArray();
    }

    public function updateRecipe(?int $id, array $content): Array
    {
        $recipe = Recipe::find($id);

        foreach ($recipe->ingredients as $ingredient) {
            $ingredientName[] = $ingredient->name;
        };

        // MAJ recette
        $recipe->update([
            'name' => $content['name'],
            'preparationTime' => $content['preparationTime'],
            'cookingTime' => $content['cookingTime'],
            'serves' => $content['serves'],

        ]);

        foreach ($ingredientName as $ingredient) {
            $recipe->ingredients()->update([
                'name' => $ingredient
            ]);
        }

        return $recipe->toArray();
    }


    public function deleteSelectedRecipe(?int $id)
    {
        $recipe = Recipe::find($id);
        $recipe->delete();
        return response("Deleted the recipe");
    }

    public function deleteAllRecipes()
    {
        Recipe::truncate();
        return response('Deleted all recipes');
    }
}

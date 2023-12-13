<?php

namespace App\Services;

use App\Models\Ingredient;
use App\Models\Recipe;

class ImporterPersistanceMySql {
    public function addRecipe(array $content): array //  Prends un tableau;
    {
        if (gettype($content['ingredients']) === 'string') {
            $ingredients = str_getcsv($content['ingredients']);
        } else {
            $ingredients = $content['ingredients'];
        }

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

    public function updateRecipe(?int $id, array $content): array
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
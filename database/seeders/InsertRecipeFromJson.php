<?php

namespace Database\Seeders;

use App\Models\Recipe;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;


class InsertRecipeFromJson extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $file = storage_path('app/recipes.json');
        $content = File::get($file);
        $data = json_decode($content, true);
        
        foreach($data['recipes'] as $recipe) {
            $recipe['ingredients'] = json_encode($recipe['ingredients']);
            Recipe::create($recipe);
        }

    }
}

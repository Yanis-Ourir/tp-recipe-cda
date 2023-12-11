<?php

namespace App\Services;

use App\Services\Importer;
use Illuminate\Support\Facades\File;

class ImportRecipesFromJson extends Importer
{
    public function insertFile($fileName): Void
    {
        $file = storage_path('app/' . $fileName);
        $data = File::get($file);
        $data = json_decode($data, true);

        foreach ($data['recipes'] as $recipe) {
            $this->recipeRepository->addRecipe($recipe);
        }
    }
}

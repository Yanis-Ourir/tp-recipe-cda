<?php

namespace App\Importers;

use App\Repositories\RecipeRepository;
use App\Services\Importer;
use App\Services\ImportRecipesFromCsv;
use App\Services\ImportRecipesFromJson;

class ImporterFactory {
    public function determineFileType($fileName) {
        return pathinfo($fileName, PATHINFO_EXTENSION);
    }

    public function createImporter($fileType) : Importer {
        switch ($fileType) {
            case 'csv':
                return new ImportRecipesFromCsv(new RecipeRepository());
            case 'json':
                return new ImportRecipesFromJson(new RecipeRepository());
            default:
                throw new \Exception('File type not supported');
        }
    }
}


<?php

namespace App\Services\Factories;

use App\Interfaces\RepositoryInterface;
use App\Services\Importer;
use App\Services\ImportRecipesFromCsv;
use App\Services\ImportRecipesFromJson;

class ImporterFactory {

    public function __construct(protected RepositoryInterface $recipeRepository)
    {
        $this->recipeRepository = $recipeRepository;
    }
 
    public function createImporter($fileType) : Importer {

        // try {
        //     return $this->importerInterface;

        // } catch (\Throwable $th) {
        //     //throw $th;
        // }

        switch ($fileType) {
            case 'csv':
                return new ImportRecipesFromCsv($this->recipeRepository);
            case 'json':
                return new ImportRecipesFromJson($this->recipeRepository);
            default:
                throw new \Exception('File type not supported');
        }
    }
}


<?php

namespace App\Services\Factories;

use App\Interfaces\RepositoryInterface;
use App\Services\Importer;


class ImporterFactory {

    protected RepositoryInterface $recipeRepository;
    

    public function __construct(RepositoryInterface $recipeRepository)
    {
        $this->recipeRepository = $recipeRepository;
    }
 
    public function createImporter($fileType) : Importer {
        $importerClass = config("importer.$fileType");
        return new $importerClass($this->recipeRepository);
    }
}


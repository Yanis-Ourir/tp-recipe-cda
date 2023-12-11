<?php

namespace App\Services;
use App\Interfaces\ImporterInterface;
use App\Repositories\RecipeRepository;


abstract class Importer implements ImporterInterface {
    protected RecipeRepository $recipeRepository;

    public function __construct(RecipeRepository $recipeRepository)
    {
        $this->recipeRepository = $recipeRepository;
    }

    abstract public function insertFile($fileName): Void;
    
}

  // injecter la factory dans la commande
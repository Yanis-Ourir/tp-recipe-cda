<?php

namespace App\Services;
use App\Interfaces\ImporterInterface;
use App\Interfaces\RepositoryInterface;


abstract class Importer implements ImporterInterface {
    protected RepositoryInterface $recipeRepository;

    public function __construct(RepositoryInterface $recipeRepository)
    {
        $this->recipeRepository = $recipeRepository;
    }

    abstract public function insertFile($fileName): Void;
    
}

  // injecter la factory dans la commande
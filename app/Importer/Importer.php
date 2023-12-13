<?php

namespace App\Importer;
use App\Interfaces\ImporterInterface;
use App\Interfaces\PersistanceInterface;
use App\Interfaces\RepositoryInterface;


abstract class Importer implements ImporterInterface {
    protected PersistanceInterface $persistanceInterface;

    public function __construct(PersistanceInterface $persistanceInterface)
    {
        $this->persistanceInterface = $persistanceInterface;
    }

    abstract public function insertFile($fileName): Void;
    
}

  // injecter la factory dans la commande
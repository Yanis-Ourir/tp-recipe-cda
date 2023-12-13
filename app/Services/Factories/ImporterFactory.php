<?php

namespace App\Services\Factories;

use App\Interfaces\PersistanceInterface;
use App\Interfaces\RepositoryInterface;
use App\Services\Importer;


class ImporterFactory {

    protected PersistanceInterface $persistanceInterface;
    

    public function __construct(PersistanceInterface $persistanceInterface)
    {
        $this->persistanceInterface = $persistanceInterface;
    }
    

    public function createImporter($fileType) : Importer {
        $importerClass = config("importer.$fileType");
        return new $importerClass($this->persistanceInterface);
    }
}


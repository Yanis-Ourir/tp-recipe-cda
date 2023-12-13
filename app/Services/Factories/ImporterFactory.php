<?php

namespace App\Services\Factories;

use App\Interfaces\FactoryInterface;
use App\Interfaces\PersistanceInterface;
use App\Services\Importer;


class ImporterFactory implements FactoryInterface {

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


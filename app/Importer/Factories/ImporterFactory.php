<?php

namespace App\Importer\Factories;

use App\Interfaces\FactoryInterface;
use App\Interfaces\PersistanceInterface;
use App\Importer\Importer;


class ImporterFactory implements FactoryInterface {

    protected PersistanceInterface $persistanceInterface;
    

    public function __construct(PersistanceInterface $persistanceInterface)
    {
        $this->persistanceInterface = $persistanceInterface;
    }
    

    public function createImporter($fileType) : Importer {
        $importerClass = config("importer.$fileType");
        return app($importerClass);
    }
}


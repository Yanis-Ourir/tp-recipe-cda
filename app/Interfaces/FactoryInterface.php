<?php

namespace App\Interfaces;
use App\Importer\Importer;

interface FactoryInterface {
    public function createImporter($fileType) : Importer;
}

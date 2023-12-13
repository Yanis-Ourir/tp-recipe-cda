<?php

namespace App\Interfaces;
use App\Services\Importer;

interface FactoryInterface {
    public function createImporter($fileType) : Importer;
}

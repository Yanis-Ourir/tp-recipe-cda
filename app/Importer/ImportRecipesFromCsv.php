<?php

namespace App\Importer;

use App\Importer\Importer;


class ImportRecipesFromCsv extends Importer
{
    public function insertFile($fileName): void
    {
        $file = storage_path('app/' . $fileName);

        $csvData = array_map('str_getcsv', file($file));


        $header = array_shift($csvData); // Supprimer header CSV;
        
        foreach ($csvData as $rowData) {
            $recipeData = array_combine($header, $rowData);
            $this->persistanceInterface->add($recipeData);
        }
    }
}

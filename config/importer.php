<?php

use App\Importer\ImportRecipesFromJson;
use App\Importer\ImportRecipesFromCsv;

return [
    'json' => ImportRecipesFromJson::class,
    'csv' => ImportRecipesFromCsv::class,
];


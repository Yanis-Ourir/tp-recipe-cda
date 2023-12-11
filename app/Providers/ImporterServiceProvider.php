<?php

namespace App\Providers;

use App\Interfaces\ImporterInterface;
use App\Repositories\RecipeRepository;
use App\Services\ImportRecipesFromCsv;
use App\Services\ImportRecipesFromJson;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Support\ServiceProvider;

class ImporterServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
        // $this->app->bind(ImportRecipesFromJson::class, function() {
        //     return new ImportRecipesFromJson(new RecipeRepository());
        // });
        
        // $this->app->when(ImportRecipesFromCsv::class)
        //     ->needs(ImporterInterface::class)
        //     ->give(function(Application $app) {
        //         return $app->make(ImportRecipesFromCsv::class);
        //     });
    }


    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        // Lire la doc 
    }
}

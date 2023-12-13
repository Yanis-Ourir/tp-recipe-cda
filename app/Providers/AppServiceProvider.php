<?php

namespace App\Providers;

use App\Interfaces\ImporterInterface;
use App\Interfaces\RepositoryInterface;
use App\Repositories\RecipeRepository;
use App\Services\ImportRecipesFromCsv;
use App\Services\ImportRecipesFromJson;
use Database\Factories\ImporterFactory;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
        $this->app->bind(RepositoryInterface::class, function() {
            return new RecipeRepository();
        });

        $this->app->bind(ImporterInterface::class, function($parameters) {
            $fileType = $parameters['fileType']; // Assuming 'fileType' is passed when resolving

            $importerClass = config("importer.$fileType");

            if (!class_exists($importerClass)) {
                throw new \Exception("Importer for file type '$fileType' does not exist");
            }

            return new $importerClass(new RepositoryInterface());
        });
    
    }
    // Créer une class factory ImportRecipeFactory instancié correctmeent le bonne importer 
    // Envoyer la persistance des données à mon repo 

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}

<?php

namespace App\Providers;

use App\Interfaces\ImporterInterface;
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

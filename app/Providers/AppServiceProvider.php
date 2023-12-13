<?php

namespace App\Providers;

use App\Interfaces\ImporterInterface;
use App\Interfaces\RepositoryInterface;
use App\Models\Recipe;
use App\Repositories\RecipeRepository;
use App\Services\Factories\ImporterFactory;
use App\Services\Importer;
use App\Services\ImportRecipesFromCsv;
use App\Services\ImportRecipesFromJson;
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

        $this->app->bind(ImporterInterface::class, function() {
            return new Importer(new RecipeRepository());
        });
    
    }
    

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}

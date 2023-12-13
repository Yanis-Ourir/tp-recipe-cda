<?php

namespace App\Providers;

use App\Interfaces\FactoryInterface;
use App\Interfaces\ImporterInterface;
use App\Interfaces\RepositoryInterface;
use App\Repositories\RecipeRepository;
use App\Services\Importer;
use Illuminate\Support\ServiceProvider;
use App\Interfaces\PersistanceInterface;
use App\Services\ImporterPersistanceMySql;
use App\Services\Factories\ImporterFactory;

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
            return new Importer(new PersistanceInterface());
        });

        $this->app->bind(PersistanceInterface::class, function() {
            return new ImporterPersistanceMySql();
        });

        $this->app->bind(FactoryInterface::class, ImporterFactory::class);
    
    }
    

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}

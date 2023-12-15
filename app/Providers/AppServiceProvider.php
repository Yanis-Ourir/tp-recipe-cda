<?php

namespace App\Providers;

use App\Events\SucceedJobEvent;
use App\Importer\Importer;
use App\Jobs\ProcessImportJob;
use App\Interfaces\FactoryInterface;
use App\Interfaces\ImporterInterface;
use App\Repositories\RecipeRepository;
use App\Interfaces\RepositoryInterface;
use Illuminate\Support\ServiceProvider;
use App\Interfaces\PersistanceInterface;
use App\Importer\ImporterPersistanceMySql;
use App\Importer\Factories\ImporterFactory;
use App\Listeners\SucceedJobListener;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Mail\Mailer;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Mail;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
    
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

        // Créer l'instance de la classe ProcessImportJob
        // $this->app->bind(ProcessImportJob::class, function(Application $app) {
        //     return new ProcessImportJob($app->make(FactoryInterface::class), '');
        // });


        // Dispatch SucceedJobEvent after ProcessImportJob worker are done in my app provider 
       

        
        
  


    
    }
    

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}

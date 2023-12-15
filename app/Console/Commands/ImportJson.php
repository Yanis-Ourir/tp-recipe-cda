<?php

namespace App\Console\Commands;

use App\Interfaces\FactoryInterface;
use App\Jobs\ProcessImportJob;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\App;

class ImportJson extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:file {file}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import your file data into your SQL Database';

    protected ProcessImportJob $processImport;

    protected FactoryInterface $factoryInterface;

    public function __construct(FactoryInterface $factoryInterface)  // On instancie l'interface dans ma commande, si jamais j'ai plusieurs factory
    {
        parent::__construct();
        $this->factoryInterface = $factoryInterface;
    }
 
    /**
     * Execute the console command.
     */
    public function handle()
    {
        $fileName = $this->argument('file');
        ProcessImportJob::dispatch($this->factoryInterface, $fileName);
        $this->info('Success, you imported your file data into your SQL Database');
    }

    protected function promptForMissingArgumentsUsing()
    {
        return [
            'file' => 'Which file do you want to import ?'
        ];
    }
}

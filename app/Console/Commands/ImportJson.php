<?php

namespace App\Console\Commands;

use App\Interfaces\FactoryInterface;
use Illuminate\Console\Command;

class ImportJson extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:file 
                            {file}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import your file data into your SQL Database';

                                       
    public function __construct(protected FactoryInterface $insertData) // On instancie l'interface dans ma commande, si jamais j'ai plusieurs factory
    {
        parent::__construct();
        $this->insertData = $insertData;
    }
    /**
     * Execute the console command.
     */
    public function handle()
    {
        // IMPORTER LE JSON DANS MA BDD
        $fileType = pathinfo($this->argument('file'), PATHINFO_EXTENSION);
   
        $this->insertData->createImporter($fileType)->insertFile($this->argument('file'));

        $this->info('Success, you imported your file data into your SQL Database');
    }

    protected function promptForMissingArgumentsUsing()
    {
        return [
            'file' => 'Which file do you want to import ?'
        ];
    }
}

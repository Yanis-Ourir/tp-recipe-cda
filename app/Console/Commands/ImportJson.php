<?php

namespace App\Console\Commands;

use App\Services\Factories\ImporterFactory;
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

                                        //  la bonne classe en fonction du type du fichier;
    public function __construct(protected ImporterFactory $insertData) // ImporterInterface $insertData
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
        // $importerClass = config('importer.' . $fileType);
      
        // dd($importerClass);
 
        // $this->insertData = App::make($importerClass);

        // $this->insertData->insertFile($this->argument('file'));
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

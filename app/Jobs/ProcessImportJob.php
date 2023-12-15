<?php

namespace App\Jobs;

use App\Events\SucceedJobEvent;
use App\Interfaces\FactoryInterface;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ProcessImportJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
 
    protected FactoryInterface $factoryInterface;
    protected string $fileName;
    public function __construct(FactoryInterface $factoryInterface, string $fileName)
    {
      $this->factoryInterface = $factoryInterface;
      $this->fileName = $fileName;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $fileExtension = pathinfo($this->fileName, PATHINFO_EXTENSION);
        $this->factoryInterface->createImporter($fileExtension)->insertFile($this->fileName);
        SucceedJobEvent::dispatch();
    }
}

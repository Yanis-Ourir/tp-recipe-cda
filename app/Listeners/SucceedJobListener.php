<?php

namespace App\Listeners;

use App\Events\SucceedJobEvent;
use App\Mail\JobMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SucceedJobListener implements ShouldQueue
{
    /**
     * Create the event listener.
     */

    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(): void
    {
        Mail::to('ourir.yanis@gmail.com')->send(new JobMail());
    }
}

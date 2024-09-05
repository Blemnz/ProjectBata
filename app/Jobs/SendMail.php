<?php

namespace App\Jobs;

use App\Mail\OrderNotif;
use App\Mail\OrderNotification;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Mail;

class SendMail
{
    use Dispatchable;

    public $data;

    /**
     * Create a new job instance.
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $data = $this->data;
        Mail::to('faisal.nizamuddin06@gmail.com')->send(new OrderNotification($data));
    }
}

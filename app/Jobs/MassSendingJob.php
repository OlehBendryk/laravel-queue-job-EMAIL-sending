<?php

namespace App\Jobs;

use App\Mail\GroupSendMail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class MassSendingJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $time;
    protected $data;
    protected $customer;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($time, $data, $customer)
    {
        $this->time = $time;
        $this->data = $data;
        $this->customer = $customer;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Mail::to($this->customer['email'])->later($this->time, new GroupSendMail($this->data, $this->customer));
    }
}


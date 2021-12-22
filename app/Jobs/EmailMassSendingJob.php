<?php

namespace App\Jobs;

use App\Mail\SendMail;
use App\Models\EmailSending;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class EmailMassSendingJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(int $id)
    {
        $emailSending = EmailSending::findOrFail($id);

        $messageTemplate = $emailSending->msg_templates()->get()->first();
        $group = $emailSending->groups()->get()->first();
        $recipients = $group->customers()->get();

        /** @var $recipient Customer model */
        foreach ($recipients as $recipient) {
            Mail::to($recipient->email)->send(new SendMail($messageTemplate, $recipient));
        }

        $emailSending->status = true;
        $emailSending->save();
    }
}

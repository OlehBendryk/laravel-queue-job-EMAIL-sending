<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;
    public $customer;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data, $customer)
    {
        $this->data = $data;
        $this->customer = $customer;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $sender = config('mail.from.address');

        return $this->from($sender)->subject($this->data['subject'])->view('admin.mail_templates.template');
    }
}

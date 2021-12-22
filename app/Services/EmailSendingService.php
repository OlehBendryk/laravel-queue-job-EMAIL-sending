<?php

namespace App\Services;

use App\Models\EmailSending;

class EmailSendingService
{

    /**
     *
     */
    public function __construct()
    {
        //
    }

    /**
     * @param array $data
     * @return EmailSending
     */
    public function create(array $data): EmailSending
    {
        $emailSending = new EmailSending();

        $emailSending->group_id = $data['group_id'];
        $emailSending->msg_template = $data['msg_template'];
        $emailSending->send_at = $data['send_at'];

        $emailSending->save();

        return $emailSending;
    }
}

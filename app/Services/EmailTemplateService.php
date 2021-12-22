<?php

namespace App\Services;

use App\Models\MessageTemplate;

class EmailTemplateService
{
    /**
     * @param  array $data
     * @return mixed
     */
    public function create(array $data)
    {
        $emailTemplate = new MessageTemplate();

        $emailTemplate->subject = $data['subject'];
        $emailTemplate->body = $data['body'];

        $emailTemplate->save();

        return $emailTemplate;
    }
}

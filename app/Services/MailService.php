<?php

namespace App\Services;

use App\Models\MessageTemplate;

class MailService
{
    protected $model;

    /**
     *
     */
    public function __construct()
    {
        $this->model = app(MessageTemplate::class);
    }

    /**
     * @param $data
     * @return mixed
     */
    public function saveMsgTemplate($data)
    {
        $msgTemplate = $this->model
            ->create([
                'group_id' => $data['group_id'],
                'subject' => $data['subject'],
                'body' => $data['body']
            ]);

        return $msgTemplate;
    }
}

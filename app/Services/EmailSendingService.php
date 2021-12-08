<?php

namespace App\Services;

use App\Models\EmailSending;

class EmailSendingService
{
    protected $model;

    /**
     * @param $model
     */
    public function __construct(EmailSending $model)
    {
        //
    }


    public function create($data)
    {
//        $this->model->create([
//            'group_id' => $data['group_id'],
//            'msg_id' => $data['msg_id'],
//            'send_time' => $data['send_time'],
//            'processing' => $data['processing'],
//        ]);
//
//        return $this->model;
    }
}

<?php

namespace App\Services;

use App\Jobs\MassSendingJob;
use App\Repositories\GroupRepository;
use Carbon\Carbon;

class MassSendingService
{
    protected $mailService;
    protected $groupRepository;

    public function __construct(MailService $mailService, GroupRepository $groupRepository)
    {
        $this->mailService = $mailService;
        $this->groupRepository = $groupRepository;
    }

    public function send($data)
    {
        $saveTemplate = $this->mailService->saveMsgTemplate($data);

        if ($data['time']){
            $time = Carbon::createFromFormat('Y-m-d H:i', $data['time'] );
        } else{
            $time = Carbon::now();
        }

        $customers = $this->groupRepository->getCustomersForGroupById($data['group_id']);

        foreach ($customers as $customer){
            $job = new MassSendingJob($time, $data, $customer );
            dispatch($job);
        }
        return $saveTemplate;
    }
}

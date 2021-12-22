<?php

namespace App\Http\Controllers\Mail;

use App\Http\Requests\EmailSendingCreateRequest;
use App\Jobs\EmailMassSendingJob;
use App\Repositories\EmailTemplateRepository;
use App\Repositories\GroupRepository;
use App\Services\EmailSendingService;

class EmailMassSendingController extends BaseMailController
{
    private $groupRepository;
    private $emailTemplateRepository;
    private $emailSendingService;

    /**
     * @param $groupRepository
     */
    public function __construct(GroupRepository $groupRepository, EmailTemplateRepository $emailTemplateRepository, EmailSendingService $emailSendingService)
    {
        parent::__construct();
        $this->groupRepository = $groupRepository;
        $this->emailTemplateRepository = $emailTemplateRepository;
        $this->emailSendingService = $emailSendingService;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        $recipients = $this->groupRepository->getNameArray();
        $msg_templates = $this->emailTemplateRepository->getAllMessageTemplates();

        return view('admin.mail_sending.create')
            ->with('recipients', $recipients)
            ->with('msg_templates', $msg_templates);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(EmailSendingCreateRequest $request)
    {
        $email_sending = $this->emailSendingService->create($request->all());
        $msg_template = $email_sending->msg_templates()->get()->first();

        if (!$request->get('send_at')) {
            (new EmailMassSendingJob())->handle($email_sending->id);
        }

        return redirect()->route('email_sending.create')
            ->with('success', "Email {$msg_template->subject} successfully send");
    }
}


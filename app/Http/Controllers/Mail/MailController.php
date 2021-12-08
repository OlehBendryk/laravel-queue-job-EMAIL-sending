<?php

namespace App\Http\Controllers\Mail;

use App\Http\Requests\MailCreateRequest;
use App\Repositories\GroupRepository;
use App\Repositories\MailRepository;
use App\Services\MailService;

class MailController extends BaseMailController
{
    private $mailRepository;
    private $mailService;
    private $groupRepository;

    public function __construct(MailRepository $mailRepository, MailService $mailService ,GroupRepository $groupRepository)
    {
        $this->mailRepository = $mailRepository;
        $this->mailService = $mailService;
        $this->groupRepository = $groupRepository;
    }

    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $templates = $this->mailRepository->getAllWithPaginate();

        return view('admin.mail.index')
            ->with('templates', $templates);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        $recipients = $this->groupRepository->getNameArray();

        return view('admin.mail.create')
            ->with('recipients', $recipients);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(MailCreateRequest $request)
    {
        $msgTemplate = $this->mailService->saveMsgTemplate($request);

        return redirect()->route('mail.index')
            ->with('success', "Message Template subject: {$msgTemplate->subject} has been created");
    }
}

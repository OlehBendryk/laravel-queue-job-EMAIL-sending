<?php

namespace App\Http\Controllers\Mail;

use App\Http\Requests\EmailTemplateCreateRequest;
use App\Repositories\EmailTemplateRepository;
use App\Services\EmailTemplateService;

class EmailTemplateController extends BaseMailController
{
    private $emailTemplateRepository;
    private $emailTemplateService;

    public function __construct(EmailTemplateRepository $emailTemplateRepository, EmailTemplateService $emailTemplateService)
    {
        parent::__construct();

        $this->emailTemplateRepository = $emailTemplateRepository;
        $this->emailTemplateService = $emailTemplateService;
    }

    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $templates = $this->emailTemplateRepository->getAllWithPaginate();

        return view('admin.mail_templates.index')
            ->with('templates', $templates);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.mail_templates.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(EmailTemplateCreateRequest $request)
    {
        $emailTemplate = $this->emailTemplateService->create($request->all());

        return redirect()->route('email.index')
            ->with('success', "Message Template subject: {$emailTemplate->subject} has been created");
    }
}

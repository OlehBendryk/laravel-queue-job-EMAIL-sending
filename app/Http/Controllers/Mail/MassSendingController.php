<?php

namespace App\Http\Controllers\Mail;

use App\Http\Requests\MailCreateRequest;
use App\Services\MassSendingService;

class MassSendingController extends BaseMailController
{
    /**
     * @var MassSendingService
     */
    private $massSendingService;

    /**
     * @param MassSendingService $massSendingService
     */
    public function __construct(MassSendingService $massSendingService)
    {
        $this->massSendingService = $massSendingService;
    }

    /**
     * @param MailCreateRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public  function sendEmail(MailCreateRequest $request)
        {
            $emailTemplate = $this->massSendingService->send($request->all());

            return redirect()->route('mail.index')
                ->with('success' , "Email with the subject: {$emailTemplate['subject']} send successfully");
        }
}

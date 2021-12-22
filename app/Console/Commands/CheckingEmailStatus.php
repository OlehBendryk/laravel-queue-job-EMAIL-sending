<?php

namespace App\Console\Commands;

use App\Jobs\EmailMassSendingJob;
use App\Models\EmailSending;
use Carbon\Carbon;
use Illuminate\Console\Command;

class CheckingEmailStatus extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'check:status';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check the status of sending email-messages';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $query = EmailSending::query();
        $query->where('status', '=', 0)->where('send_at', '<', Carbon::now());

        /* display console diagram of the progress */
        $bar = $this->getOutput()->createProgressBar($query->count());
        $bar->start();

        /** @var  $emailSending EmailSending*/
        foreach ($query->cursor() as $emailSending){
            (new EmailMassSendingJob())->handle($emailSending->id);

            $bar->advance();
        }
        $bar->finish();
    }
}

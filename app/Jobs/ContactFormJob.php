<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Mail\ContactForm;
use Mail;
use App\Setting;

class ContactFormJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    public $messages;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($messages)
    {
        $this->messages  = $messages;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $setting = new Setting;
        $recipient = $setting->getSetting()->email_address;

        if(empty($recipient))
        {
            $recipient = ENV('ADMIN_MAIL_TO_ADDRESS');
        }

        Mail::to($recipient)->send(new ContactForm($this->messages));
    }
}

<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\JobApplication;

class JobApplicationReceived extends Mailable
{
    use Queueable, SerializesModels;

    public JobApplication $application;

    public function __construct(JobApplication $application)
    {
        $this->application = $application;
    }

    public function build()
    {
        return $this->subject('New job application received')
            ->view('emails.job_application_received')
            ->with(['application' => $this->application]);
    }
}

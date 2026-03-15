<?php

namespace App\Mail;

use App\Models\EmailTemplate;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TemplateMail extends Mailable
{
    use Queueable, SerializesModels;

    public string $parsedBody;
    public string $parsedSubject;

    public function __construct(string $templateName, array $variables = [])
    {
        $template = EmailTemplate::where('name', $templateName)->active()->first();

        if ($template) {
            $this->parsedSubject = $template->parseSubject($variables);
            $this->parsedBody = $template->parseBody($variables);
        } else {
            $this->parsedSubject = $templateName;
            $this->parsedBody = 'No template found for: ' . $templateName;
        }
    }

    public function build()
    {
        return $this->subject($this->parsedSubject)
            ->view('emails.template')
            ->with([
                'emailBody' => $this->parsedBody,
            ]);
    }
}

<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PasswordResetMail extends Mailable
{
    use Queueable, SerializesModels;

    public string $resetUrl;
    public string $recipientName;
    public string $portalType;

    public function __construct(string $resetUrl, string $recipientName, string $portalType = 'customer')
    {
        $this->resetUrl = $resetUrl;
        $this->recipientName = $recipientName;
        $this->portalType = $portalType;
    }

    public function build()
    {
        return $this->subject('Password Reset Request — Constraal')
            ->view('emails.password_reset')
            ->with([
                'resetUrl' => $this->resetUrl,
                'recipientName' => $this->recipientName,
                'portalType' => $this->portalType,
            ]);
    }
}

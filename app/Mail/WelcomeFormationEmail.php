<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use RealRashid\SweetAlert\Facades\Alert;

class WelcomeFormationEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $mailMessage;
    public $subject;
    public $toEmail;
    public $toUserName;
    public $module;

    /**
     * Create a new message instance.
     */
    public function __construct($message, $subject, $toEmail, $toUserName, $module)
    {
        $this->mailMessage  = $message;
        $this->subject      = $subject;
        $this->toEmail      = $toEmail;
        $this->toUserName   = $toUserName;
        $this->module       = $module;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address('lamine.badji@onfp.sn', 'ONFP, Démarrage formation'),
            replyTo: [
                new Address('lamine.badji@onfp.sn', 'ONFP, Réponse démarrage formation')
            ],
            subject: $this->subject,
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        Alert::success("E-mails envoyés !", "Notifications de démarrage bien envoyés");
        return new Content(
            view: 'formations.maildebut',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}

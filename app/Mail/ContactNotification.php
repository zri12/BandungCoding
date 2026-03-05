<?php

namespace App\Mail;

use App\Domain\Contact\Models\Contact;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ContactNotification extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(
        public readonly Contact $contact
    ) {}

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: '[BandungCoding] Pesan Baru dari ' . $this->contact->name,
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'mail.contact-notification',
        );
    }
}

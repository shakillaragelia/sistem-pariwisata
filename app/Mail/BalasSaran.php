<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class BalasSaran extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(
        public string $subjek,
        public string $konten,
        public string $balasan,
    ) {}

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Balasan: ' . $this->subjek,
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.balas-saran',
        );
    }
}
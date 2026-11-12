<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ContactInquiryMail extends Mailable
{
    use Queueable, SerializesModels;

    public array $inquiryData;

    /**
     * Create a new message instance.
     */
    public function __construct(array $inquiryData)
    {
        $this->inquiryData = $inquiryData;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        $senderName = $this->inquiryData['name'] ?? 'Pengunjung NazwaGraha';
        $senderEmail = $this->inquiryData['email'] ?? 'nazwagraha@gmail.com';
        $subject = !empty($this->inquiryData['subject'])
            ? '[Pertanyaan Web] ' . $this->inquiryData['subject']
            : '[Pertanyaan Web] Pesan Baru dari ' . $senderName;

        return new Envelope(
            subject: $subject,
            replyTo: [
                new Address($senderEmail, $senderName),
            ],
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.contact-inquiry',
            with: [
                'data' => $this->inquiryData,
            ],
        );
    }

    /**
     * Get the attachments for the message.
     */
    public function attachments(): array
    {
        return [];
    }
}

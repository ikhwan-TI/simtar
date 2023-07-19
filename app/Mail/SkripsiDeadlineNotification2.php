<?php

namespace App\Mail;

use App\Models\Skripsi;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SkripsiDeadlineNotification2 extends Mailable
{
    use Queueable, SerializesModels;
    public $skripsi;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Skripsi $skripsi)
    {
        $this->skripsi = $skripsi;
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            subject: 'Skripsi Deadline Notification',
        );
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content()
    {
        return new Content(
            view: 'emails.skripsi-deadline-notification2',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        return [];
    }
}

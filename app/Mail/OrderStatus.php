<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class OrderStatus extends Mailable
{
    use Queueable, SerializesModels;

    public $order;
    public $title1;
    public $title2;
    public $subject;
    public $message1;
    public $message2;
    public $color;

    public function __construct($order, $title1, $title2, $subject, $message1, $message2 , $color)
    {
        $this->order = $order;
        $this->title1 = $title1;
        $this->title2 = $title2;
        $this->subject = $subject;
        $this->message1 = $message1;
        $this->message2 = $message2;
        $this->color = $color;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: $this->subject,
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'Mail.OrderStatus',
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

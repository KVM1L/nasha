<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactFormMail extends Mailable
{
    use Queueable, SerializesModels;

    public $formData;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($formData)
    {
        $this->formData = $formData;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // Важно: from() можно динамически сформировать,
        // но лучше в .env явно указать MAIL_FROM_ADDRESS/NAME
        return $this->from(config('mail.from.address'), config('mail.from.name'))
                    ->subject('Сообщение из контактной формы')
                    ->view('emails.contact-form');
    }
}

<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class DataLogin extends Mailable
{
    use Queueable, SerializesModels;

    /**
     *
     * Create a new message instance.
     *
     * @return void
     */

        public $id;
        public $nama;
        public $role;
        public $email;

    public function __construct(User $user)
    {
        $this->id = $user->id;
        $this->nama = $user->name;
        $this->role = $user->role;
        $this->email = $user->email;
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            from: new Address('vaness13337@gmail.com', 'Vaness'),
            subject: 'Full Data Diri Login',
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
            view: 'mail_template.datadiri',
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

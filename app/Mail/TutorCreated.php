<?php

namespace App\Mail;

use App\models\Tutor;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class TutorCreated extends Mailable
{
    use Queueable, SerializesModels;

    public $tutor;


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Tutor $tutor)
    {
        $this->tutor = $tutor;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Welcome message')->view('emails.user.tutorCreated');
    }
}

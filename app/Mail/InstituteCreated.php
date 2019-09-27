<?php

namespace App\Mail;

use App\models\Institute;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class InstituteCreated extends Mailable
{
    use Queueable, SerializesModels;

    public $institute;
    
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Institute $institute)
    {
        $this->institute = $institute;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Welcome message')->view('emails.user.instituteCreated');
    }
}

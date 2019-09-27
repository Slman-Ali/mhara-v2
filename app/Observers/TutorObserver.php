<?php

namespace App\Observers;

use App\Mail\TutorCreated;
use App\models\Tutor;
use Illuminate\Support\Facades\Mail;

class TutorObserver
{
    /**
     * Handle the tutor "created" event.
     *
     * @param  \App\models\Tutor  $tutor
     * @return void
     */
    public function created(Tutor $tutor)
    {
        // send welcome email
        // Mail::to($tutor->user->email)->queue(new TutorCreated($tutor));
    }

    /**
     * Handle the tutor "updated" event.
     *
     * @param  \App\models\Tutor  $tutor
     * @return void
     */
    public function updated(Tutor $tutor)
    {
        //
    }

    /**
     * Handle the tutor "deleted" event.
     *
     * @param  \App\models\Tutor  $tutor
     * @return void
     */
    public function deleted(Tutor $tutor)
    {
        //
    }

    /**
     * Handle the tutor "restored" event.
     *
     * @param  \App\models\Tutor  $tutor
     * @return void
     */
    public function restored(Tutor $tutor)
    {
        //
    }

    /**
     * Handle the tutor "force deleted" event.
     *
     * @param  \App\models\Tutor  $tutor
     * @return void
     */
    public function forceDeleted(Tutor $tutor)
    {
        //
    }
}

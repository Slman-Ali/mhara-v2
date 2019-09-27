<?php

namespace App\Observers;

use App\Mail\InstituteCreated;
use App\models\Institute;
use Illuminate\Support\Facades\Mail;

class InstituteObserver
{
    /**
     * Handle the institute "created" event.
     *
     * @param  \App\models\Institute  $institute
     * @return void
     */
    public function created(Institute $institute)
    {
        // send welcome email
        // Mail::to($institute->user->email)->queue(new InstituteCreated($institute));
    }

    /**
     * Handle the institute "updated" event.
     *
     * @param  \App\models\Institute  $institute
     * @return void
     */
    public function updated(Institute $institute)
    {
        //
    }

    /**
     * Handle the institute "deleted" event.
     *
     * @param  \App\models\Institute  $institute
     * @return void
     */
    public function deleted(Institute $institute)
    {
        //
    }

    /**
     * Handle the institute "restored" event.
     *
     * @param  \App\models\Institute  $institute
     * @return void
     */
    public function restored(Institute $institute)
    {
        //
    }

    /**
     * Handle the institute "force deleted" event.
     *
     * @param  \App\models\Institute  $institute
     * @return void
     */
    public function forceDeleted(Institute $institute)
    {
        //
    }
}

<?php

namespace App\Observers;

use App\Mail\StudentCreated;
use App\models\Student;
use Illuminate\Support\Facades\Mail;

class StudentObserver
{
    /**
     * Handle the student "created" event.
     *
     * @param  \App\models\Student  $student
     * @return void
     */
    
    public function created(Student $student)
    {
        // send welcome email
        // Mail::to($student->user->email)->queue(new StudentCreated($student));
    }

    /**
     * Handle the student "updated" event.
     *
     * @param  \App\models\Student  $student
     * @return void
     */
    public function updated(Student $student)
    {
        //
    }

    /**
     * Handle the student "deleted" event.
     *
     * @param  \App\models\Student  $student
     * @return void
     */
    public function deleted(Student $student)
    {
        //
    }

    /**
     * Handle the student "restored" event.
     *
     * @param  \App\models\Student  $student
     * @return void
     */
    public function restored(Student $student)
    {
        //
    }

    /**
     * Handle the student "force deleted" event.
     *
     * @param  \App\models\Student  $student
     * @return void
     */
    public function forceDeleted(Student $student)
    {
        //
    }
}

<?php

namespace App\Providers;

use App\models\Institute;
use App\models\Student;
use App\models\Tutor;
use App\Observers\InstituteObserver;
use App\Observers\StudentObserver;
use App\Observers\TutorObserver;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        Student::observe(StudentObserver::class);
        Tutor::observe(TutorObserver::class);
        Institute::observe(InstituteObserver::class);
    }
}

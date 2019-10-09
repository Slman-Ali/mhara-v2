<?php

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; 

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UsersTableSeeder::class,
            EnglishSeeder::class, 
            // MailsSeeder::class,
            ReviewParametersSeeder::class,
            CitiesSeeder::class,
            CoursesSeeder::class,
            GenderSeeder::class,
            AvailableTimeSeeder::class
        ]);
    }
}

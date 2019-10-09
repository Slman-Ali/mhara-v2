<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\models\Tutor;
use Faker\Generator as Faker;

$factory->define(Tutor::class, function (Faker $faker) {
    return [
        'first_name' => "tutor-".(App\Tutor::max('id')->id + 1),
        'last_name' => $faker->lastName,
        'mobile' => $faker->phoneNumber,
        'image' => 'tutor-default.jpg',
        'city' => random_int(1,14),
        'address' => $faker->address,
        'birth_date' => randomDateInRange(new DateTime('1970-05-06'),new DateTime('1998-05-06')),
        'gender' => random_int(1,2),
        'tagline' => $faker->text(30),
        'facebook' => $faker->url,
        'user_id' => (App\User::max('id')),
        'priority_by_admin' => rand(0,3) 
    ];
});

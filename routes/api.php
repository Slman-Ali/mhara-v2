<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('tutors-count', 'API\TutorController@count');

Route::get('institutes-count', 'API\InstituteController@count');

Route::get('students-count', 'API\StudentController@count');

Route::get('users-count', 'API\HomeController@countAll');

Route::get('cities-names-with-tutors-count', 'API\HomeController@getCitiesWithTutorsCount');
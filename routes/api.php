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

// return number of registered tutors
Route::get('tutors-count', 'API\TutorController@count');

// return number of registered institute
Route::get('institutes-count', 'API\InstituteController@count');

// return number of registered students
Route::get('students-count', 'API\StudentController@count');



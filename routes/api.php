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

Route::post('login', 'API\AuthController@login');

Route::get('tutors-count', 'API\TutorController@count');

Route::get('institutes-count', 'API\InstituteController@count');

Route::get('students-count', 'API\StudentController@count');

Route::get('users-count', 'API\HomeController@countAll');

Route::get('cities-names-with-tutors-count', 'API\HomeController@getCitiesWithTutorsCount');


Route::get('popular-institutes-courses', 'API\InstituteCourseController@getPopularCourses');
Route::get('popular-tutors-courses', 'API\TutorCourseController@getPopularCourses');

Route::get('popular-courses', 'API\CommonController@getPopularCourses');

Route::get('featured-tutors', 'API\TutorController@getFeaturedTutors');
Route::get('featured-institutes', 'API\InstituteController@getFeaturedInstitutes');

Route::get('advanced-search', 'API\SearchController@search');
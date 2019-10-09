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
Route::post('register', 'API\AuthController@register');

Route::get('tutors/count', 'API\TutorController@count');

Route::get('institutes/count', 'API\InstituteController@count');

Route::get('students/count', 'API\StudentController@count');

Route::get('users/count', 'API\HomeController@countAll');

Route::get('cities/names-with-tutors-count', 'API\HomeController@getCitiesWithTutorsCount');


Route::get('institute-courses/popular', 'API\InstituteCourseController@getPopularCourses');
Route::get('tutor-courses/popular', 'API\TutorCourseController@getPopularCourses');

Route::get('courses/popular', 'API\CommonController@getPopularCourses');

Route::get('tutors/featured', 'API\TutorController@getFeaturedTutors');
Route::get('institutes/featured', 'API\InstituteController@getFeaturedInstitutes');

Route::get('search/tutors', 'API\SearchController@searchTutor');
Route::get('search/institutes', 'API\SearchController@searchInstitute');
<?php

namespace App\Services;

use App\models\Institute;
use App\models\Tutor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\SearchTutor as SearchTutorResource;
use App\Http\Resources\SearchInstitute as SearchInstituteResource;

class SearchService
{

    public function __construct()
    { }

    public function search(Request $request)
    {
        $tutors = (new TutorService)->searchTutor($request);

        return $tutors;
    }


    public function searchTutor(Request $request)
    {
        $gets = [
            DB::raw("concat(first_name,' ' , last_name) as tutor_name"),
            "image",
            "cities.name_ar as city_name",
            "address",
            DB::raw("TIMESTAMPDIFF(YEAR, `birth_date`, CURDATE()) as tutor_age"),
            "genders.name_ar as gender",
            "tagline",
            "available_times.name_ar as available_time",
            "facebook",
            "whatsapp",
            "tutor_courses.stars_num as course_rate",
            "tutors.stars_num as tutor_rate",
            "title as course_title",
            "description as course_description",
            "initial_price",
            "discount_price",
            "course_levels.name_ar as level",
            "course_types.name_ar as type",
            "views as course_views",
            "hours as course_hours",
            "email",
            "verified_by_admin as verified"
        ];


        $results = Tutor::select($gets)
            ->join('tutor_courses', 'tutors.user_id', '=', 'tutor_courses.user_id')
            ->join('cities', 'cities.id', '=', 'tutors.city')
            ->join('users', 'users.id', '=', 'tutors.user_id')
            ->join('course_types', 'course_types.id', '=', 'tutor_courses.type')
            ->join('course_levels', 'course_levels.id', '=', 'tutor_courses.level')
            ->join('genders', 'genders.id', '=', 'tutors.gender')
            ->join('available_times', 'available_times.id', '=', 'tutors.available_time');


        $results->where('users.verified_by_admin', 1)
            ->where('users.is_active', 1);


        if ($request->has('city')) {
            $results->where(DB::raw('lower(cities.name_en)'), '=', strtolower($request->city));
        }
        if ($request->has('min_rating')) {
            $results->where('tutor_courses.stars_num', '>=', $request->min_rating);
        }
        if ($request->has('max_rating')) {
            $results->where('tutor_courses.stars_num', '<=', $request->max_rating);
        }
        if ($request->has('available_days')) {
            $daysMaskArray = getDaysMaskArray();
            $available_days = 0;
            $request->available_days = explode(',', $request->available_days);
            foreach ($request->available_days as $day) {
                $available_days |= $daysMaskArray[$day];
            }
            $available_days = decbin($available_days);
            while (strlen($available_days) < 7) $available_days = "0$available_days";
            $available_days = str_replace('0', '_', $available_days);

            $results->where('tutors.available_days', 'like', $available_days);
        }
        if ($request->has('min_cost')) {
            $results->where('tutor_courses.discount_price', '>=', $request->min_cost);
        }
        if ($request->has('max_cost')) {
            $results->where('tutor_courses.discount_price', '<=', $request->max_cost);
        }
        if ($request->has('min_age')) {
            $results->where(DB::raw('TIMESTAMPDIFF(YEAR, `birth_date`, CURDATE())'), '>=', $request->min_age);
        }
        if ($request->has('gender')) {
            $results->where('genders.name_en', '=', $request->gender);
        }
        if ($request->has('experience_years')) {
            $results->where('tutors.experience_years', '>=', $request->experience_years);
        }
        if ($request->has('level')) {
            $results->where(DB::raw('lower(course_levels.name_en)'), '=', strtolower($request->level));
        }
        if ($request->has('type')) {
            $results->where(DB::raw('lower(course_types.name_en)'), '=', strtolower($request->type));
        }

        $results->orderBy('priority_by_admin', 'desc');
        $results->orderBy('tutors.stars_num', 'desc');


        $tutors = $results->paginate(15);

        return SearchTutorResource::collection($tutors);

        // return $results->get();
    }


    public function searchInstitute(Request $request)
    {
        $gets = [
            "name",
            "image",
            "cities.name_ar as city_name",
            "address",
            "tagline",
            "available_times.name_ar as available_time",
            "start_date",
            "finish_date",
            "start_time",
            "finish_time",
            "facebook",
            "whatsapp",
            "institute_courses.stars_num as course_rate",
            "institutes.stars_num as institute_rate",
            "title as course_title",
            "description as course_description",
            "initial_price",
            "discount_price",
            "course_levels.name_ar as level",
            "course_types.name_ar as type",
            "views as course_views",
            "hours as course_hours",
            "email",
            "verified_by_admin as verified"
        ];


        $results = Institute::select($gets)
            ->join('institute_courses', 'institutes.user_id', '=', 'institute_courses.user_id')
            ->join('cities', 'cities.id', '=', 'institutes.city')
            ->join('users', 'users.id', '=', 'institutes.user_id')
            ->join('course_types', 'course_types.id', '=', 'institute_courses.type')
            ->join('course_levels', 'course_levels.id', '=', 'institute_courses.level')
            ->join('available_times', 'available_times.id', '=', 'institutes.available_time');


        $results->where('users.verified_by_admin', 1)
            ->where('users.is_active', 1);


        if ($request->has('city')) {
            $results->where(DB::raw('lower(cities.name_en)'), '=', strtolower($request->city));
        }
        if ($request->has('min_rating')) {
            $results->where('institute_courses.stars_num', '>=', $request->min_rating);
        }
        if ($request->has('max_rating')) {
            $results->where('institute_courses.stars_num', '<=', $request->max_rating);
        }
        if ($request->has('available_days')) {
            $daysMaskArray = getDaysMaskArray();
            $available_days = 0;
            $request->available_days = explode(',', $request->available_days);
            foreach ($request->available_days as $day) {
                $available_days |= $daysMaskArray[$day];
            }
            $available_days = decbin($available_days);
            while (strlen($available_days) < 7) $available_days = "0$available_days";
            $available_days = str_replace('0', '_', $available_days);

            $results->where('institutes.available_days', 'like', $available_days);
        }
        if ($request->has('min_cost')) {
            $results->where('institute_courses.discount_price', '>=', $request->min_cost);
        }
        if ($request->has('max_cost')) {
            $results->where('institute_courses.discount_price', '<=', $request->max_cost);
        }
        if ($request->has('level')) {
            $results->where(DB::raw('lower(course_levels.name_en)'), '=', strtolower($request->level));
        }
        if ($request->has('type')) {
            $results->where(DB::raw('lower(course_types.name_en)'), '=', strtolower($request->type));
        }

        $results->orderBy('priority_by_admin', 'desc');
        $results->orderBy('institutes.stars_num', 'desc');

        $courses = $results->paginate(15);


        return SearchInstituteResource::collection($courses);
    }
}

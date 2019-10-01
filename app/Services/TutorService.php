<?php

namespace App\Services;

use App\models\Tutor;
use App\models\TutorCourse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TutorService
{


    public function __construct()
    { }

    public function getCount()
    {
        return Tutor::all()->count();
    }

    public function getTutorsCountInCity(int $cityId)
    {
        return Tutor::where('city', '=', $cityId)->get()->count();
    }

    public function getFeaturedTutors(int $limit = 3)
    {
        $data = [];
        $featured = Tutor::orderBy('priority_by_admin', 'desc')->limit($limit)->get();

        foreach ($featured as $tutor) {
            $data[] = [
                'name' => ($tutor->first_name . " " . $tutor->last_name),
                'rating' => $tutor->stars_num,
                'image' => $tutor->image,
            ];
        }
        return $data;
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
            $results->where('lower(cities.name_en)', '=', strtolower($request->city));
        }
        if ($request->has('min_rating')) {
            $results->where('tutor_courses.rating', '>=', $request->min_rating);
        }
        if ($request->has('max_rating')) {
            $results->where('tutor_courses.rating', '<=', $request->max_rating);
        }
        if ($request->has('available_days')) {
            $available_days = 0;

            foreach ($request->available_days as $day) {
                $available_days |= $day;
            }
            $available_days = decbin($available_days);
            while (strlen($available_days) < 7) $available_days = "0$available_days";
            $available_days = str_replace('1', '_', $available_days);

            $results->where('tutor.available_days', 'like', $available_days);
        }
        if ($request->has('min_cost')) {
            $results->where('tutor_courses.cost', '>=', $request->min_cost);
        }
        if ($request->has('max_cost')) {
            $results->where('tutor_courses.cost', '<=', $request->max_cost);
        }
        if ($request->has('min_age')) {
            $results->where('TIMESTAMPDIFF(YEAR, `birth_date`, CURDATE())', '>=', $request->min_age);
        }
        if ($request->has('gender')) {
            $genders = get_genders();
            $gender = $genders[strtolower($request->gender)];

            $results->where('tutors.gender', '=', $gender);
        }
        if ($request->has('experience_years')) {
            $results->where('tutors.experience_years', '>=', $request->experience_years);
        }
        if ($request->has('level')) {
            $results->where('tutor_courses.level', '=', $request->level);
        }

        if ($request->has('type')) {
            $results->where('lower(course_types.name_en)', '=', strtolower($request->type));
        }

        $limit = 15;
        $results->limit($limit);

        return $results->get();
    }
}

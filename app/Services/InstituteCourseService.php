<?php

namespace App\Services;

use App\models\InstituteCourse;
use DateTime;

class InstituteCourseService
{


    public function __construct()
    { }

    public function getCount()
    {
        $coursesCount = InstituteCourse::all()->count();
        return $coursesCount;
    }

    public function getPopularCourses(int $limit = 5)
    {
        $data = [];
        $popularCourses = InstituteCourse::select('institute_courses.*', 'institutes.image', 'institutes.priority_by_admin')
            ->join('institutes', 'institute_courses.user_id', '=', 'institutes.user_id')
            ->where('institute_courses.finish_date' , '>' , date('Y-m-d'))
            ->orderBy('priority_by_admin', 'desc')
            ->orderBy('institute_courses.stars_num', 'desc')
            ->limit($limit)
            ->get();
        foreach ($popularCourses as $course) {
            $data[] = [
                'title' => $course->title,
                'rating' => $course->stars_num,
                'image' => $course->image,
                'start_date' => $course->start_date,
                'finish_date' => $course->finish_date,
                'priority' => $course->priority_by_admin
            ];
        }
        return $data;
    }

}

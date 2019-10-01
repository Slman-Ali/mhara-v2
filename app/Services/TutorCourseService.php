<?php

namespace App\Services;

use App\models\TutorCourse;

class TutorCourseService
{


    public function __construct()
    { }

    public function getCount()
    {
        $coursesCount = TutorCourse::all()->count();
        return $coursesCount;
    }

    public function getPopularCourses(int $limit = 5)
    {
        $data = [];
        $popularCourses = TutorCourse::select('tutor_courses.*', 'tutors.image', 'tutors.priority_by_admin')
            ->join('tutors', 'tutor_courses.user_id', '=', 'tutors.user_id')
            ->orderBy('priority_by_admin', 'desc')
            ->orderBy('tutor_courses.stars_num', 'desc')
            ->limit($limit)
            ->get();
        foreach ($popularCourses as $course) {
            $data[] = [
                'title' => $course->title,
                'rating' => $course->stars_num,
                'image' => $course->image,
                'priority' => $course->priority_by_admin,
            ];
        }
        return $data;
    }
}

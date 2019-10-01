<?php

namespace App\Services;

class CommonService
{

    public function __construct()
    { }


    public function getPopularCourses(int $limit = 5)
    {
        $data = [];

        $instituePopularCourses = (new InstituteCourseService)->getPopularCourses($limit);
        $tutorPopularCourses = (new TutorCourseService)->getPopularCourses($limit);

        $n = count($instituePopularCourses);
        $m = count($tutorPopularCourses);

        $i = $j = 0;
        $flag = true;
        for (; count($data) < $limit;) {
            if ($i < $n && $j < $m) {
                if ($instituePopularCourses[$i]['priority'] > $tutorPopularCourses[$j]['priority']) {
                    $data[] = $instituePopularCourses[$i++];
                } else if ($instituePopularCourses[$i]['priority'] < $tutorPopularCourses[$j]['priority']) {
                    $data[] = $tutorPopularCourses[$j++];
                } else {
                    if ($flag === true) {
                        $data[] = $instituePopularCourses[$i++];
                    } else {
                        $data[] = $tutorPopularCourses[$j++];
                    }
                    $flag = !$flag;
                }
            } else if ($j < $m) {
                $data[] = $tutorPopularCourses[$j++];
            } else {
                $data[] = $instituePopularCourses[$i++];
            }
        }
        return $data;
    }
}

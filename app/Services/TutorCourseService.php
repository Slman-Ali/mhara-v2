<?php

namespace App\Services;

use App\models\TutorCourse;

class TutorCourseService{


    public function __construct(){
        
    }

    public function getCount(){
        $coursesCount = TutorCourse::all()->count();
        return $coursesCount;
    }
 
    public function getPopularCourses(){

    }
    
    
}
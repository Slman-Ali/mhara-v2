<?php

namespace App\Services;

use App\models\InstituteCourse;

class InstituteCourseService{


    public function __construct(){
        
    }

    public function getCount(){
        $coursesCount = InstituteCourse::all()->count();
        return $coursesCount;
    }
 
    public function getPopularCourses(){

    }
    
    
}
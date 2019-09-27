<?php

namespace App\Services;

use App\models\Student;

class StudentService{


    public function __construct(){
        
    }
 
    public function getCount(){
        return Student::all()->count();
    }
    
    
}
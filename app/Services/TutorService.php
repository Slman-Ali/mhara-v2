<?php

namespace App\Services;

use App\models\Tutor;

class TutorService{


    public function __construct(){
        
    }
 
    public function getCount(){
        return Tutor::all()->count();
    }
    
    public function getTutorsCountInCity(int $cityId){
        return Tutor::where('city' , '=' , $cityId)->get()->count();
    }

}
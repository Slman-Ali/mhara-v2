<?php

namespace App\Services;

use App\models\Institute;

class InstituteService{


    public function __construct(){
        
    }
 
    public function getCount(){
        return Institute::all()->count();
    }
    
    
}
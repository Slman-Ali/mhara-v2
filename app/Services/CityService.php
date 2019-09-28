<?php

namespace App\Services;

use App\models\City;

class CityService{


    public function __construct(){
        
    }
 
    public function getCount(){
        return City::all()->count();
    }

    public function getAll(){
        return City::all();
    }
    
    
}
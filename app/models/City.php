<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    static function getAll(){
        return City::all();
    }


    static function getById(int $city_id){
        return City::find($city_id);
    }
}

<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    //

    static function getCount(){
        return Student::all()->count();
    }

    public function user(){
        return $this->belongsTo('App\User','user_id','id');
    }
}

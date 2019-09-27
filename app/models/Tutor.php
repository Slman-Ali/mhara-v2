<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Tutor extends Model
{
    //

    static function getCount(){
        return Tutor::all()->count();
    }

    
    public function user(){
        return $this->belongsTo('App\User','user_id','id');
    }
    
}

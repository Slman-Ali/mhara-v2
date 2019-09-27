<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Institute extends Model
{
    //

    static function getCount(){
        return Institute::all()->count();
    }

    
    public function user(){
        return $this->belongsTo('App\User','user_id','id');
    }
    
}

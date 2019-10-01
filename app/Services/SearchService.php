<?php

namespace App\Services;

use Illuminate\Http\Request;

class SearchService
{

    public function __construct()
    { }

    public function search(Request $request){
        $tutors = (new TutorService)->searchTutor($request);

        return $tutors;
    }

}

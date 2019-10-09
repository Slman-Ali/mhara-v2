<?php

namespace App\Services;

use App\models\Tutor;
use App\models\TutorCourse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TutorService
{


    public function __construct()
    { }

    public function getCount()
    {
        return Tutor::all()->count();
    }

    public function getTutorsCountInCity(int $cityId)
    {
        return Tutor::where('city', '=', $cityId)->get()->count();
    }

    public function getFeaturedTutors(int $limit = 3)
    {
        $data = [];
        $featured = Tutor::orderBy('priority_by_admin', 'desc')->limit($limit)->get();

        foreach ($featured as $tutor) {
            $data[] = [
                'name' => ($tutor->first_name . " " . $tutor->last_name),
                'rating' => $tutor->stars_num,
                'image' => $tutor->image,
            ];
        }
        return $data;
    }


}

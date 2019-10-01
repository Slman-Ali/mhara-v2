<?php

namespace App\Services;

use App\models\Institute;

class InstituteService
{


    public function __construct()
    { }

    public function getCount()
    {
        return Institute::all()->count();
    }

    public function getFeaturedInstitutes(int $limit = 3)
    {
        $data = [];
        $featured = Institute::orderBy('priority_by_admin', 'desc')->limit($limit)->get();

        foreach ($featured as $institute) {
            $data[] = [
                'name' => $institute->name,
                'rating' => $institute->stars_num,
                'image' => $institute->image,
            ];
        }
        return $data;
    }
}

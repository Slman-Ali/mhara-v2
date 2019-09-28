<?php

namespace App\Services;

class HomeService{

    public function __construct(){
        
    }
 
    public function getCountAll(){
        $institutesCount = (new InstituteService)->getCount();
        $tutorsCount = (new TutorService)->getCount();
        $studentsCount = (new StudentService)->getCount();
        $coursesCount = (new InstituteCourseService)->getCount();
        $coursesCount += (new TutorCourseService)->getCount();
    

        return [
            "institutesCount" => $institutesCount,
            "tutorsCount" => $tutorsCount,
            "studentsCount" => $studentsCount,
            "coursesCount" => $coursesCount
        ];
    }
    
    /**
     * return array where each element is associative array has:
     * nameAr: city name in arabic
     * nameEn: city name in english
     * tutorsCount: number of tutors in this city
     */
    public function getCitiesWithTutorsCount(){
        $data = [];
        $cities = (new CityService)->getAll();

        $tutorService = new TutorService;
        foreach($cities as $city){
            $tutorsCount = $tutorService->getTutorsCountInCity($city->id);
            $data[] = [
                "nameAr" => $city->name_ar,
                "nameEn" => $city->name_en,
                "tutorsCount" => $tutorsCount
            ];
        }
        return $data;
    }
}
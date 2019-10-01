<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\InstituteCourseService;

class InstituteCourseController extends Controller
{
 
    protected $instituteCourseService;

    public function __construct(InstituteCourseService $instituteCourseService){
        $this->instituteCourseService = $instituteCourseService;
    }

    public function getPopularCourses(){
        $data = $this->instituteCourseService->getPopularCourses();
        return response()->json($data, 200);
    }
    
}

<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\CommonService;
use App\Services\InstituteCourseService;

class CommonController extends Controller
{
    
    protected $commonService;

    public function __construct(CommonService $commonService)
    {
        $this->commonService = $commonService;
    }


    public function getPopularCourses(int $limit = 5){
        $data = $this->commonService->getPopularCourses($limit);
        return response()->json($data, 200);
    }

}

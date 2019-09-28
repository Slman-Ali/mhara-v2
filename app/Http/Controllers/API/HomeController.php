<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\HomeService;

class HomeController extends Controller
{

    protected $homeService;

    public function __construct( HomeService $homeService ){
        $this->homeService = $homeService;
    }

    public function countAll(){
        $data = $this->homeService->getCountAll();
        return response()->json($data, 200);
    }


    public function getCitiesWithTutorsCount(){
        $data = $this->homeService->getCitiesWithTutorsCount();
        return response()->json($data, 200);
    }
    
}

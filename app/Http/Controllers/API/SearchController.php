<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\SearchService;

class SearchController extends Controller
{

    protected $searchService;

    public function __construct(SearchService $searchService)
    {
        $this->searchService = $searchService;
    }

    public function searchTutor(Request $request){
        $data = $this->searchService->searchTutor($request);

        return $data;
    }

    public function searchInstitute(Request $request){
        $data = $this->searchService->searchInstitute($request);

        return $data;
    }
}

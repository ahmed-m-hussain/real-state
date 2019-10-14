<?php

namespace App\Http\Controllers\Web;

use App\About;
use App\Http\Controllers\Controller;
use App\RealEstateAppraisal;
use Illuminate\Http\Request;

class ServiceController extends Controller
{

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $realEstateAppraisal = RealEstateAppraisal::first();
        $sections = $realEstateAppraisal->sections()->get();
        return response(['realEstateAppraisal' => $realEstateAppraisal, 'sections' => $sections], 200);
    }

}

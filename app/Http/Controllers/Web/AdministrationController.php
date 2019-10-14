<?php

namespace App\Http\Controllers\Web;

use App\Administration;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdministrationController extends Controller
{

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $administration = Administration::first();
        $points = $administration->points()->get();

        dd('ss');
        return response([
            'administration' => $administration,
            'points' => $points,
        ], 200);
    }

}

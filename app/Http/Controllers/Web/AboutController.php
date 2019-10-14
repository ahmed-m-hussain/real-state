<?php

namespace App\Http\Controllers\Web;

use App\About;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AboutController extends Controller
{

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $about = About::first();
        $founders = $about->founders()->get();
        return response(['about' => $about, 'founders' => $founders], 200);
    }

}

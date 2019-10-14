<?php

namespace App\Http\Controllers\Web;

use App\Home;
use App\Http\Controllers\Controller;
use App\Mail\SendMailable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $homes = Home::where('type', '=', $request->type)->paginate(12);
        return response(['homes' => $homes], 200);
    }


    /**
     * @param $id
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function show($id)
    {
        $home = Home::with('icons')->findOrFail($id);
        $images = $home->images()->where('type', 1)->get();
        $drawings = $home->images()->where('type', 2)->get();
        return response(['home' => $home,'images'=>$images, 'drawings'=>$drawings], 200);
    }


    public  function  sendEmail(Request $request)
    {
        $request->validate([
            'name'    => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'email'    => 'required|email',
            'phone'    => 'required|numeric',
        ]);

        $data = $request->all();
        Mail::to('krunal@appdividend.com')->send(new SendMailable($data));
        return response(['message' => 'Email was sent'], 200);

    }
}

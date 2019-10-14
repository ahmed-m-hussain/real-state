<?php

namespace App\Http\Controllers\Web;

use App\Contact;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContactController extends Controller
{

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $contact = Contact::first();
        return response(['contact' => $contact], 200);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function sendContact(Request $request)
    {
        $contact = Contact::create([
            'city' => $request->city,
            'country' => $request->country,
            'address' => $request->address,
            'email' => $request->email,
            'phone' => $request->phone,
            'name' => $request->name,
            'surname' => $request->surname,
            'message' => $request->message,
        ]);
        return response(['contact' => $contact], 201);
    }
}

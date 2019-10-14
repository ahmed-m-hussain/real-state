<?php

namespace App\Http\Controllers\Admin;

use App\About;
use App\Founder;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $about = About::first();
       return view('admin.about.index', compact('about'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $request->validate([
            'page_title_en'  => 'required|string|max:255',
            'text_title_en'  => 'required|string|max:255',
            'description_en' => 'required|string',
            'page_title_it'  => 'required|string|max:255',
            'text_title_it'  => 'required|string|max:255',
            'description_it' => 'required|string',
            'page_title_de'  => 'required|string|max:255',
            'text_title_de'  => 'required|string|max:255',
            'description_de' => 'required|string',
        ]);
        $data = $request->all();

        $about = About::where('id','=', $id)->first();
        $about->update([
            'page_title_en'  => $data['page_title_en'],
            'text_title_en'  => $data['text_title_en'],
            'description_en' => $data['description_en'],
            'page_title_it'  => $data['page_title_it'],
            'text_title_it'  => $data['page_title_it'],
            'description_it' => $data['description_it'],
            'page_title_de'  => $data['page_title_de'],
            'text_title_de'  => $data['text_title_de'],
            'description_de' => $data['description_de'],

        ]);

        Founder::where('about_id', '=', $id)->delete();

        $founders =[];
        if(isset($data['first_name'] )){
            foreach ($data['first_name'] as $key => $value){
                if(!empty($value) && !empty($data['first_name'][$key])){

                    if(isset($data['avatar_image'][$key]) && !empty(isset($data['avatar_image'][$key]))){
                        $imageName = $data['avatar_image'][$key]->hashName();
                        $data['avatar_image'][$key]->move(public_path('images/uploads'), $imageName);
                    }else{
                        $imageName = $data['avatar'][$key];
                    }

                    $founders[] =[
                        'avatar'         => $imageName,
                        'first_name'     => $data['first_name'][$key],
                        'last_name'      => $data['last_name'][$key],
                        'specialty_en'   => $data['specialty_en'][$key],
                        'position_en'    => $data['position_en'][$key],
                        'expert_info_en' => $data['expert_info_en'][$key],
                        'specialty_it'   => $data['specialty_it'][$key],
                        'position_it'    => $data['position_it'][$key],
                        'expert_info_it' => $data['expert_info_it'][$key],
                        'specialty_de'   => $data['specialty_de'][$key],
                        'position_de'    => $data['position_de'][$key],
                        'expert_info_de' => $data['expert_info_de'][$key],

                    ];
                }

            }
        }

        $about->founders()->createMany($founders);

//        if(isset($data['avatar_image'] )){
//            $founders = Founder::where('about_id', '=', $id)->get();
//            foreach ($data['avatar_image'] as $key => $value){
//                if(!empty($value) && !empty($data['avatar_image'][$key])){
//                    foreach ($founders as $founder){
//                        $imageName = $value->hashName();
//                        $value->move(public_path('images/uploads'), $imageName);
//                        Founder::where('id', $founder->id)->update([
//                            'avatar'  => $imageName,
//                        ]);
//                    }
//
//                }
//
//            }
//
//        }



//        dd($founders);
        Session::flash('success_message', 'About info successfully updated!');
        return redirect()->route('about.index');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

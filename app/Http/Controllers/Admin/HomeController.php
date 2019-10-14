<?php

namespace App\Http\Controllers\Admin;

use App\Home;
use App\Http\Controllers\Controller;
use App\Icon;
use App\Image;
use Illuminate\Http\Request;
use Session;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $homes = Home::paginate(10);
      return view('admin.home.index',compact('homes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $home = new Home();
       return view('admin.home.form', compact('home'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $request->validate([
            'city'    => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'room'    => 'required|numeric',
            'size'    => 'required|numeric',
            'detail'  => 'required|string',
            'price'   => 'required|numeric',
            'bathroom' => 'required|numeric',
            'type'    => 'required|numeric',
            'garden'  =>'numeric',
            'gym'     =>'numeric',
            'sauna'   =>'numeric',
            'cover_image' => 'required',
            'latitude'   =>'required',
            'longitude' =>'required',
        ]);

        if ($request->hasFile('cover_image')) {
            $imageName = time().'.'.$data['cover_image']->getClientOriginalExtension();
            $data['cover_image']->move(public_path('images/uploads'), $imageName);
            $data['cover_image'] = $imageName;
        }



        $home = Home::create([
                'city'     => $data['city'],
                'address'  => $data['address'],
                'room'     => $data['room'],
                'size'     => $data['size'],
                'detail'   => $data['detail'],
                'price'    => $data['price'],
                'bathroom' => $data['bathroom'],
                'type'     => $data['type'],
                'garden'   =>isset($data['garden'])?$data['garden'] : 0,
                'gym'      =>isset($data['gym'])?$data['gym'] : 0,
                'sauna'    =>isset($data['sauna'])?$data['sauna'] : 0,
                'cover_image'=>isset($data['cover_image'])?$data['cover_image'] : null,
                'latitude'   =>$data['latitude'],
                'longitude' =>$data['longitude'],

         ]);

        $images = [];
        if(isset($data['photo_url'])){

            foreach ($data['photo_url'] as $image){


                $imageName=$image->hashName();
                $image->move(public_path('images/uploads'), $imageName);
                $images[] = [
                    'image'   => $imageName,
                    'type' => 1
                ];

            }
        }
        if(isset($data['drawings'])){

            foreach ($data['drawings'] as $image){


                $imageName=$image->hashName();
                $image->move(public_path('images/uploads'), $imageName);
                $images[] = [
                    'image'   => $imageName,
                    'type' => 2
                ];

            }
        }


        $home->images()->createMany($images);

        $icons = [];
        foreach ($data['icons_name'] as $key => $value){
            if(!empty($value) && !empty($data['icons'][$key])){
                $icons[] =[
                    'name' => $value,
                    'font' => $data['icons'][$key]
                ];
            }

        }
        $home->icons()->createMany($icons);

        Session::flash('success_message', 'Home successfully added!');
        return redirect()->route('home.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $home = Home::findOrFail($id);
        return view('admin.home.view',compact('home'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $home = Home::with('images')
            ->with('icons')
            ->find($id);

        return view('admin.home.form',compact('home'));
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
        $data = $request->all();


        $request->validate([
            'city' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'room' => 'required|numeric',
            'size' => 'required|numeric',
            'detail' => 'required|string',
            'price' => 'required|numeric',
            'bathroom' => 'required|numeric',
            'type' => 'required|numeric',
            'garden'=>'numeric',
            'gym'=>'numeric',
            'sauna'=>'numeric',
            'latitude'   =>'required',
            'longitude' =>'required',

        ]);
        if ($request->hasFile('cover_image')) {
            $lastCoverImage = public_path('images/uploads/'.$data['lastCoverImage']);
            if (file_exists($lastCoverImage)){
                chmod($lastCoverImage, 777);
                unlink($lastCoverImage);
            }
            $imageName = time().'.'.$data['cover_image']->getClientOriginalExtension();
            $data['cover_image']->move(public_path('images/uploads'), $imageName);
            $data['cover_image'] = $imageName;
        }else{
            $data['cover_image'] = $data['lastCoverImage'];
        }

        $home = Home::where('id','=', $id)->first();
        $home->update([
            'city'     => $data['city'],
            'address'  => $data['address'],
            'room'     => $data['room'],
            'size'     => $data['size'],
            'detail'   => $data['detail'],
            'price'    => $data['price'],
            'bathroom' => $data['bathroom'],
            'type'     => $data['type'],
            'garden'=>isset($data['garden'])?$data['garden'] : 0,
            'gym'=>isset($data['gym'])?$data['gym'] : 0,
            'sauna'=>isset($data['sauna'])?$data['sauna'] : 0,
            'cover_image'=>isset($data['cover_image'])?$data['cover_image'] : null,
            'latitude'   =>$data['latitude'],
            'longitude' =>$data['longitude'],
        ]);

        $images = [];
        if(isset($data['photo_url'])){

            foreach ($data['photo_url'] as $image){


                $imageName = $image->hashName();
                $image->move(public_path('images/uploads'), $imageName);
                $images[] = [
                    'image'   => $imageName,
                    'type' => 1
                ];

            }
        }
        if(isset($data['drawings'])){

            foreach ($data['drawings'] as $image){


                $imageName = $image->hashName();
                $image->move(public_path('images/uploads'), $imageName);
                $images[] = [
                    'image'   => $imageName,
                    'type' => 2
                ];

            }
        }


        $home->images()->createMany($images);


        Icon::where('home_id', '=', $id)->delete();
        $icons = [];
        foreach ($data['icons_name'] as $key => $value){
            if(!empty($value) && !empty($data['icons'][$key])){
                $icons[] =[
                    'name' => $value,
                    'font' => $data['icons'][$key]
                ];
            }

        }
        $home = Home::where('id','=', $id)->findOrFail($id);
        $home->icons()->createMany($icons);

        Session::flash('success_message', 'Home successfully updated!');
        return redirect()->route('home.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Home::findOrFail($id);
        $item->delete();
        Session::flash('success_message', 'Home successfully deleted!');
        return redirect()->route('home.index');
    }
}

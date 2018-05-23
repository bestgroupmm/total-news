<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Advertising;
use Validator;
use Session;
use File;

class AdvertisingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $adves = Advertising::all();

        return view('admin.ads.index',compact('adves'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.ads.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'company' => 'required|max:255',
            'phone' => 'required|max:255',
            'email' => 'required|max:255',
            'address' => 'required|max:255',
            'start' => 'required|max:255',
            'end' => 'required|max:255',
            'duration' => 'required|max:255',
            'image' => 'required|mimes:jpg,png,jpeg',
            'link' => 'required|max:255',
            'contact_person' => 'max:255',
            'contact_phone' => 'max:255',
        ]);

        if($validator->fails())
        {
            return back()->withInput()->withErrors($validator);
        }
        else{

            if($request->hasFile('image'))
            {
                $image = $request->file('image');
                $img_name = strtolower(str_replace(' ', '_', $request->company)).'_'.date('Y-m-d-Hms').'.jpg';
                $img_path = 'uploads/ads';

                $image->storeAs($img_path,$img_name);

                $image_url = $img_path.'/'.$img_name;

            }
            else{
                $image_url = "";
            }

            $ads = new Advertising;
            $ads->image = $image_url;
            $ads->link = $request->link;
            $ads->company = $request->company;
            $ads->email = $request->email;
            $ads->phone = $request->phone;
            $ads->address = $request->address;
            $ads->start = $request->start;
            $ads->end = $request->end;
            $ads->duration = $request->duration;
            $ads->expire = 0;
            $ads->contact_person = $request->contact_person;
            $ads->contact_phone = $request->contact_phone;
            $ads->save();

            return redirect('admin/ads');

        }
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
        $ads = Advertising::find($id);

        return view('admin.ads.edit',compact('ads'));
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
        $validator = Validator::make($request->all(),[
            'company' => 'required|max:255',
            'phone' => 'required|max:255',
            'email' => 'required|max:255',
            'address' => 'required|max:255',
            'start' => 'required|max:255',
            'end' => 'required|max:255',
            'duration' => 'required|max:255',
            'image' => 'mimes:jpg,png,jpeg',
            'link' => 'required|max:255',
            'contact_person' => 'max:255',
            'contact_phone' => 'max:255',
        ]);

        if($validator->fails())
        {
            return back()->withInput()->withErrors($validator);
        }
        else{

            $ads = Advertising::find($id);

            if($request->hasFile('image'))
            {

                $img_del = $ads->image;
                if(is_file($ads->image))
                {
                    File::delete($img_del);
                }

                $image = $request->file('image');
                $img_name = strtolower(str_replace(' ', '_', $request->company)).'_'.date('Y-m-d-Hms').'.jpg';
                $img_path = 'uploads/ads';

                $image->storeAs($img_path,$img_name);

                $image_url = $img_path.'/'.$img_name;

            }
            else{
                $image_url = $ads->image;;
            }

            $ads->image = $image_url;
            $ads->link = $request->link;
            $ads->company = $request->company;
            $ads->email = $request->email;
            $ads->phone = $request->phone;
            $ads->address = $request->address;
            $ads->start = $request->start;
            $ads->end = $request->end;
            $ads->duration = $request->duration;
            $ads->expire = 0;
            $ads->contact_person = $request->contact_person;
            $ads->contact_phone = $request->contact_phone;
            $ads->save();

            return redirect('admin/ads');

        }
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

<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\SocialLink;
use Validator;

class SocialLinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $socials = SocialLink::all();

        return view('admin.sociallink.index',compact('socials'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.sociallink.create');
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
            'title' => 'required|max:255',
            'class' => 'required|max:255',
            'icon' => 'required|max:255',
            'link' => 'required|max:255',
        ]);

        if($validator->fails())
        {
            return back()->withInputs()->withError($validator);
        }
        else{
            $social = new SocialLink;
            $social->title = $request->title;
            $social->class = $request->class;
            $social->icon = $request->icon;
            $social->link = $request->link;
            $social->save();

            return redirect('/admin/social-links');
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
        $social = SocialLink::find($id);

        return view('admin.sociallink.edit',compact('social'));
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
            'title' => 'required|max:255',
            'class' => 'required|max:255',
            'icon' => 'required|max:255',
            'link' => 'required|max:255',
        ]);

        if($validator->fails())
        {
            return back()->withInputs()->withError($validator);
        }
        else{
            $social = SocialLink::find($id);
            $social->title = $request->title;
            $social->class = $request->class;
            $social->icon = $request->icon;
            $social->link = $request->link;
            $social->save();

            return redirect('/admin/social-links');
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
        $social = SocialLink::find($id);

        if($social)
        {
            $social->delete();
        }
        return redirect('admin/social-links');
    }
}

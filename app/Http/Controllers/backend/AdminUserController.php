<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Role;
use App\User;
use Auth;
use Validator;
use File;

class AdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $users = User::whereHas(
        'roles', function($q){
            $q->where('name', '!=', 'user');
        })->get();
        return view('admin.user.index',['users'=>$users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();

        return view('admin.user.create',compact('roles'));
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

            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'role' => 'required',
            'avatar' => 'mimes:jpg,jpeg,png',

        ]);

        if($validator->fails())
        {
            return back()->withErrors($validator)->withInput();
        }
        else{

            $user = new User;

            if($request->hasFile('avatar'))
            {
                $avatar = $request->file('avatar');
                $img_name = date('Y-m-d').'_'.time().'.jpg';
                $img_path = 'uploads/admin-users/'.date('Y').'/'.date('F').'/'.date('d-D');

                $avatar->storeAs($img_path,$img_name);

                $user->avatar = $img_path.'/'.$img_name;

            }

            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->save();

            $role = Role::where('name',$request->role)->first();

            $user->attachRole($role);

            return redirect('admin/users');
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
        $user = User::with('roles')->where('id',$id)->first();

        $roles = Role::all();

        foreach($user->roles as $r)
        {
            $ur[] = $r->name;
        }

        return view('admin.user.edit',compact('user','roles','ur'));
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
        if($request->change == 'yes')
        {
            $validator = Validator::make($request->all(),[

                'name' => 'required|string|max:255',
                'email' => 'required|email|max:255|unique:users,email,'.$id,
                'password' => 'required|string|min:6|confirmed',
                'role' => 'required',
                'avatar' => 'mimes:jpg,jpeg,png',

            ]);
        }
        else{
            $validator = Validator::make($request->all(),[

                'name' => 'required|string|max:255',
                'email' => 'required|email|max:255|unique:users,email,'.$id,
                'role' => 'required',
                'avatar' => 'mimes:jpg,jpeg,png',

            ]);
        }

        if($validator->fails())
        {
            return back()->withErrors($validator)->withInput();
        }
        else{

            $user = User::with('roles')->where('id',$id)->first();

            if($request->hasFile('avatar'))
            {
                if(is_file($user->avatar))
                {
                    File::delete($user->avatar);
                }

                $avatar = $request->file('avatar');
                $img_name = date('Y-m-d').'_'.time().'.jpg';
                $img_path = 'uploads/admin-users/'.date('Y').'/'.date('F').'/'.date('d-D');

                $avatar->storeAs($img_path,$img_name);

                $user->avatar = $img_path.'/'.$img_name;

            }

            $user->name = $request->name;
            $user->email = $request->email;
            if($request->change == 'yes')
            {
                $user->password = Hash::make($request->password);
            }
            $user->save();

            foreach($user->roles as $r)
            {
                $rn = $r->name;

                $rerole = Role::where('name',$rn)->first();
                $user->detachRole($rerole);
            }

            $role = Role::where('name',$request->role)->first();

            $user->attachRole($role);

            return redirect('admin/users');
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
        $user = User::with('roles')->find($id);

        if(is_file($user->avatar))
        {
            File::delete($user->avatar);
        }

        foreach($user->roles as $r)
        {
            $rn = $r->name;

            $rerole = Role::where('name',$rn)->first();
            $user->detachRole($rerole);
        }

        $user->delete();

        return back();   
    }
}

<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;
use Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('guest')->except('logout');
    // }

    public function __construct(Guard $auth)
    {
         $this->middleware('guest')->except('logout');
    }

    // public function login(Request $request)
    // {
    //     $email      = $request->get('email');
    //     $password   = $request->get('password');
    //     $remember   = $request->get('remember');


    //     if ($this->auth->attempt([
    //         'email'     => $email,
    //         'password'  => $password
    //     ])) {

    //         if ( $this->auth->user()->hasRole('user')) {

    //             return redirect('/user/dashboard');
    //             // return redirect()->back();

    //         }

    //         if ( $this->auth->user()->hasRole('administrator')) {

    //             return redirect('/admin');

    //         }

    //     }
    //     else {

    //         return redirect()->back()
    //             ->with('message','သင်၏ email နှင့် password မှန်ကန်ခြင်းမရှိပါ။')
    //             ->with('status', 'danger')
    //             ->withInput();
    //     }

    // }
}

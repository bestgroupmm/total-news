<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\ArticelCategory;
use App\Visitor;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $ip = \Request::ip();

        $location = \Location::get($ip);

        $visitor = Visitor::where('ip_address',$ip)->first();

        if(!$visitor)
        {
            $visitor = new Visitor;
            $visitor->ip_address = $ip;
            $visitor->device = '';
            $visitor->location = $location->latitude.'_'.$location->longitude;
            $visitor->city = $location->cityName;
            $visitor->region = $location->regionName;
            $visitor->country = $location->countryName;
            $visitor->zipcode = $location->zipCode;
            $visitor->postalcode = $location->postalCode;
            $visitor->save();
        }

        $favourites = Article::orderBy('view','desc')->skip(1)->take(10)->get();

        $random = Article::inRandomOrder()->first();

        return view('index',compact('favourites','random'));
    }
}

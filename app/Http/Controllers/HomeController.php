<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Gallery;
use App\Models\Social;
use App\Models\Photo;
use App\Models\Visitor;
use \Carbon\Carbon;
use Auth;
use Stevebauman\Location\Facades\Location;

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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $services = Service::take(3)->get();
        $galleries = Gallery::where('status', 1)->orderBy('order','ASC')->with('photo')->get();
        $socials = Social::all();

        if (Auth::check()){
            if (Auth::user()->isAdmin()){

            }else{
                $ip = $request->ip();

                // Today Visitors Access
                $today = \Carbon\Carbon::today()->format('Y-m-d');
                $visitors = Visitor::where('page', 'Home')->whereDate('created_at','=',$today)->get();

                foreach($visitors as $visitor){
                    if($visitor->ip_address == $ip){
                        $old_visitor = $visitor;
                    }
                }

                if(! empty($old_visitor)){
                    $old_visitor->increment('visits');
                }else{
                    $location = Location::get($ip);
                    if($location == true){
                        Visitor::create(['ip_address'=>$ip, 'page'=>'Home', 'visits'=> 1, 'countryName'=>$location->countryName, 'countryCode'=> $location->countryCode]);
                    }else{
                        Visitor::create(['ip_address'=>$ip, 'page'=>'Home', 'visits'=> 1]);
                    }
                }
            }
        }else{

            $ip = $request->ip();

            // Today Visitors Access
            $today = \Carbon\Carbon::today()->format('Y-m-d');
            $visitors = Visitor::where('page', 'Home')->whereDate('created_at','=',$today)->get();

            foreach($visitors as $visitor){
                if($visitor->ip_address == $ip){
                    $old_visitor = $visitor;
                }
            }

            if(! empty($old_visitor)){
                $old_visitor->increment('visits');
            }else{
                $location = Location::get($ip);
                if($location == true){
                    Visitor::create(['ip_address'=>$ip, 'page'=>'Home', 'visits'=> 1, 'countryName'=>$location->countryName, 'countryCode'=> $location->countryCode]);
                }else{
                    Visitor::create(['ip_address'=>$ip, 'page'=>'Home', 'visits'=> 1]);
                }
            }

        }


        return view('home', compact('services','galleries','socials'));
    }
}

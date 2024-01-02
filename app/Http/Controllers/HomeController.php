<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Gallery;
use App\Models\Social;
use App\Models\Photo;

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
    public function index()
    {
        $services = Service::take(3)->get();
        $galleries = Gallery::where('status', 1)->orderBy('order','ASC')->with('photo')->get();
        $socials = Social::all();

        return view('home', compact('services','galleries','socials'));
    }
}

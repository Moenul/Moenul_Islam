<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artical;
use App\Models\Quote;
use App\Models\Photo;

class ArticalsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $articals = '';
        // $articals = Artical::latest()->get(['content','slug']);


        if($request) {
            if($request->tags) {
                $articals = Artical::where('tags','like','%'.$request->tags.'%')->latest()->simplePaginate(5);
            }else{
                $articals = Artical::latest()->paginate(6);
            }
        }

        $quotes = Quote::take(1000)->get()->random(3);

        return view('articals.index', compact('articals','quotes'));
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
    public function show($request)
    {
        $artical = Artical::where('slug', $request)->first();

        views($artical)->cooldown($minutes = 5)->record();

        $quotes = Quote::take(1000)->get()->random(3);

        return view('articals.show', compact('artical','quotes'));
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
        //
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

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Quote;
use App\Models\Photo;
use App\Models\Visitor;
use \Carbon\Carbon;
use Auth;

class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $articles = '';

        if($request) {
            if($request->tags) {
                $articles = Article::where('tags','like','%'.$request->tags.'%')->latest()->simplePaginate(5);
            }else{
                $articles = Article::latest()->paginate(6);
            }
        }

        if(Quote::count() > 3){
            $quotes = Quote::take(1000)->get()->random(3);
        }else{
            $quotes = Quote::latest()->get();
        }


        if (Auth::check()){
            if (Auth::user()->isAdmin()){

            }else{

                $ip = $request->ip();

                // Today Visitors Access
                $today = \Carbon\Carbon::today()->format('Y-m-d');
                $visitors = Visitor::where('page', 'Article')->whereDate('created_at','=',$today)->get();

                foreach($visitors as $visitor){
                    if($visitor->ip_address == $ip){
                        $old_visitor = $visitor;
                    }
                }

                if(! empty($old_visitor)){
                    $old_visitor->increment('visits');
                }else{
                    Visitor::create(['ip_address'=>$ip, 'page'=>'Article', 'visits'=> 1]);
                }
            }
        }else{

            $ip = $request->ip();

            // Today Visitors Access
            $today = \Carbon\Carbon::today()->format('Y-m-d');
            $visitors = Visitor::where('page', 'Article')->whereDate('created_at','=',$today)->get();

            foreach($visitors as $visitor){
                if($visitor->ip_address == $ip){
                    $old_visitor = $visitor;
                }
            }

            if(! empty($old_visitor)){
                $old_visitor->increment('visits');
            }else{
                Visitor::create(['ip_address'=>$ip, 'page'=>'Article', 'visits'=> 1]);
            }
        }

        return view('articles.index', compact('articles','quotes'));
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
        $article = Article::where('slug', $request)->first();

        if (Auth::check()){
            if (Auth::user()->isAdmin()){

            }else{
                views($article)->cooldown($minutes = 5)->record();
            }
        }else{
            views($article)->cooldown($minutes = 5)->record();
        }

        return view('articles.show', compact('article'));
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

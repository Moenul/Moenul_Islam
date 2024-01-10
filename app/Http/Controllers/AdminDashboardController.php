<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Visitor;
use \Carbon\Carbon;

class AdminDashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // Total Visitors in 7 days -------------
        $date = \Carbon\Carbon::today()->subDays(7);
        $total_visitors = Visitor::where('page', 'Home')->whereDate('created_at','>=',$date);
        $total_article_visitors = Visitor::where('page', 'Article')->whereDate('created_at','>=',$date);
        // Total Visitors in 7 days -------------

        $visitors = Visitor::where('page', 'Home')->get();


        $date = \Carbon\Carbon::today()->subDays(30);

        $visitorByCountry = Visitor::where('page', 'Home')->whereDate('created_at','>=',$date)->get()->groupBy(function($data) {
            return $data->countryName;
        });


        $date = \Carbon\Carbon::today()->subDays(7);

        $visitorByDate = Visitor::orderBy('created_at')->whereDate('created_at','>=',$date)->get()->groupBy(function($data) {
            return \Carbon\Carbon::parse($data->created_at)->format('d M Y');
        });

        return view('admin/index', compact('visitors','total_visitors','total_article_visitors','visitorByCountry','visitorByDate'));
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

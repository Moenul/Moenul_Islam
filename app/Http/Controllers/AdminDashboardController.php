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


        // Today Visitors -------------
        $today = \Carbon\Carbon::today()->subDays(0);
        $today_visitors = Visitor::where('page', 'Home')->whereDate('created_at','=',$today);
        $today_Article_visitors = Visitor::where('page', 'Article')->whereDate('created_at','=',$today);
        // Today Visitors -------------


        // Previus Days Visitors Access
        $date = \Carbon\Carbon::today()->subDays(1);
        $oneDayAgo_visitors = Visitor::where('page', 'Home')->whereDate('created_at','=',$date);
        $oneDayAgo_Article_visitors = Visitor::where('page', 'Article')->whereDate('created_at','=',$date);

        // Two Days Visitors Access
        $date = \Carbon\Carbon::today()->subDays(2);
        $towDaysAgo_visitors = Visitor::where('page', 'Home')->whereDate('created_at','=',$date);
        $towDaysAgo_Article_visitors = Visitor::where('page', 'Article')->whereDate('created_at','=',$date);

        // Three Days Visitors Access
        $date = \Carbon\Carbon::today()->subDays(3);
        $threeDaysAgo_visitors = Visitor::where('page', 'Home')->whereDate('created_at','=',$date);
        $threeDaysAgo_Article_visitors = Visitor::where('page', 'Article')->whereDate('created_at','=',$date);

        // Four Days Visitors Access
        $date = \Carbon\Carbon::today()->subDays(4);
        $fourDaysAgo_visitors = Visitor::where('page', 'Home')->whereDate('created_at','=',$date);
        $fourDaysAgo_Article_visitors = Visitor::where('page', 'Article')->whereDate('created_at','=',$date);

        // five Days Visitors Access
        $date = \Carbon\Carbon::today()->subDays(5);
        $fiveDaysAgo_visitors = Visitor::where('page', 'Home')->whereDate('created_at','=',$date);
        $fiveDaysAgo_Article_visitors = Visitor::where('page', 'Article')->whereDate('created_at','=',$date);

        // six Days Visitors Access
        $date = \Carbon\Carbon::today()->subDays(6);
        $sixDaysAgo_visitors = Visitor::where('page', 'Home')->whereDate('created_at','=',$date);
        $sixDaysAgo_Article_visitors = Visitor::where('page', 'Article')->whereDate('created_at','=',$date);


        $visitors = Visitor::where('page', 'Home')->get();

        return view('admin/index', compact('today_visitors','today_Article_visitors','oneDayAgo_visitors','oneDayAgo_Article_visitors','towDaysAgo_visitors','towDaysAgo_Article_visitors','threeDaysAgo_visitors','threeDaysAgo_Article_visitors','fourDaysAgo_visitors','fourDaysAgo_Article_visitors','fiveDaysAgo_visitors','fiveDaysAgo_Article_visitors','sixDaysAgo_visitors','sixDaysAgo_Article_visitors','visitors','total_visitors','total_article_visitors'));
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

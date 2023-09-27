<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artical;
use App\Models\Category;

class AdminArticalsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articals = Artical::orderBy('created_at', 'desc')->get();

        return view('admin.articals.index', compact('articals'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::pluck('name','id')->all();

        return view('admin.articals.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Artical::create($request->all());
        return redirect('admin/articals')->with('success', 'Artical Successfully Created!');
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
        $artical = Artical::findOrFail($id);
        $categories = Category::pluck('name','id')->all();

        return view('admin.articals.edit', compact('artical','categories'));
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
        $artical = Artical::findOrFail($id);
        $artical->update($request->all());

        return redirect('admin/articals')->with('success', 'Artical Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Artical::findOrFail($id)->delete();
        return redirect()->back()->with('warning', 'Artical Deleted!');
    }
}

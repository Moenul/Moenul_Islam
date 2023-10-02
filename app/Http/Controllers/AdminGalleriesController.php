<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gallery;
use App\Models\Photo;
use Image;

class AdminGalleriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $galleries = Gallery::latest()->with('photo')->get();
        return view('admin.galleries.index', compact('galleries'));
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
        $input = $request->all();

        if ($file = $request->file('photo_id')) {
            $imageConvert = Image::make($file)->encode('webp', 90);
            // if ($imageConvert->width() > 380){
            //     $imageConvert->resize(380, null, function ($constraint) {
            //         $constraint->aspectRatio();
            //     });
            // }

            $name = time() . $file->getClientOriginalName();
            $filename = pathinfo($name, PATHINFO_FILENAME);
            $destinationPath = public_path('images/' . $filename . '.webp');

            $imageConvert->save($destinationPath);

            $name = $filename . ".webp";

            $photo = Photo::create(['file'=>$name]);

            $input['photo_id'] = $photo->id;
        }



        Gallery::create($input);

        return redirect('admin/galleries')->with('success', 'Gallery Item Successfully Added!');
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
        $gallery = Gallery::findOrFail($id);
        return view('admin.galleries.edit', compact('gallery'));
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
        $gallery = Gallery::findOrFail($id);

        $input = $request->all();

        if($file = $request->file('photo_id')){

            if ($gallery->photo_id !== null) {
                unlink(public_path() . $gallery->photo->file);

                $photo = $gallery->photo->id;
                Photo::findOrFail($photo)->delete();
            }

            $imageConvert = Image::make($file)->encode('webp', 90);

            $name = time() . $file->getClientOriginalName();
            $filename = pathinfo($name, PATHINFO_FILENAME);
            $destinationPath = public_path('images/' . $filename . '.webp');

            $imageConvert->save($destinationPath);

            $name = $filename . ".webp";

            $photo = Photo::create(['file'=>$name]);

            $input['photo_id'] = $photo->id;
        }

        $gallery->update($input);

        return redirect('/admin/galleries')->with('success', 'Gallery Item Successfully Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $gallery = Gallery::findOrFail($id);

        if ($gallery->photo_id !== null) {
            unlink(public_path() . $gallery->photo->file);

            $photo = $gallery->photo->id;
            Photo::findOrFail($photo)->delete();
        }

        $gallery->delete();
        return redirect()->back()->with('warning', 'Gallery Item Deleted!');
    }
}

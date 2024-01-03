<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Photo;
use Image;

class AdminProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profile = Auth::user();

        return view('admin.profile.index', compact('profile'));
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
        $profile = User::findOrFail($id);

        $input = $request->all();

        if($file = $request->file('photo_id')){

            if ($profile->photo_id !== null) {
                unlink(public_path() . $profile->photo->file);

                $photo = $profile->photo->id;
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


        if ($profile->cv_id !== null) {
            unlink(public_path() . $profile->cv->file);

            $cv = $profile->cv->id;
            Photo::findOrFail($cv)->delete();
        }

        if($file = $request->file('cv_id')){
            $name = $file->getClientOriginalName();

            $file->move('images', $name);

            $photo = Photo::create(['file'=>$name]);

            $input['cv_id'] = $photo->id;
        }

        $profile->update($input);

        return redirect('/admin/profile')->with('success', 'Profile Successfully Updated!');
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

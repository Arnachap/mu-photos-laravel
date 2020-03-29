<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;
use App\Slide;

class SliderController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slides = Slide::orderBy('position')->get();

        return view('admin.slider.index')->with('slides', $slides);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->hasFile('slide')) {
            $filename = $request->file('slide')->getClientOriginalName();

            $file = Image::make($request->file('slide'));
    
            $file->resize(null, 1080, function ($constraint) {
                $constraint->aspectRatio();
            });

            $file->save('storage/slides/' . $filename);

            $slide = new Slide;
            $slide->filename = $filename;
            $slide->save();

            return redirect('/slider')->with('success', 'Photos ajoutées !');
        } else {
            return redirect('/slider')->with('error', 'Aucun fichier séléctionné...');
        }
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
        $slide = Slide::find($id);

        Storage::delete('public/slides/' . $slide->filename);

        $slide->delete();

        return redirect('/slider')->with('success', 'Photo supprimée !');
    }

    /*
    *   Sort slider photos
    */
    public function sort(Request $request) {
        foreach ($request->id as $index => $id) {
            $slide = Slide::find($id);
            $slide->position = $index;
            $slide->save();
        }

        return redirect('/slider')->with('success', 'Ordre des photos sauvegarder !');
    }
}

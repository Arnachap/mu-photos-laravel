<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Testimonial;

class TestimonialsController extends Controller
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
        $testimonials = Testimonial::all();

        return view('admin.testimonials.index')->with('testimonials', $testimonials);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.testimonials.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
            'thumbnail' => 'image|required|max:1999'
        ]);

        // Handle File Upload
        // Get filename with extension
        $filenameWithExt = $request->file('thumbnail')->getClientOriginalName();
        // Get just file name
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        // Get just extension
        $extension = $request->file('thumbnail')->getClientOriginalExtension();
        // Filename to store
        $filenameToStore = $filename . '_' . time() . '.' . $extension;
        // Upload image
        $path = $request->file('thumbnail')->storeAs('public/testimonials', $filenameToStore);

        $testimonial = new Testimonial;
        $testimonial->title = $request->input('title');
        $testimonial->body = $request->input('body');
        $testimonial->thumbnail = $filenameToStore;
        $testimonial->save();

        return redirect('/temoignages')->with('success', 'Témoignage ajouté !');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $testimonial = Testimonial::find($id);

        return view('admin.testimonials.edit')->with('testimonial', $testimonial);
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
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required'
        ]);
            
        $testimonial = Testimonial::find($id);
        $testimonial->title = $request->input('title');
        $testimonial->body = $request->input('body');

        if ($request->file('thumbnail')) {
            
            // Delete old thumbnail
            Storage::delete('public/testimonials/' . $testimonial->thumbnail);

            // Handle File Upload
            // Get filename with extension
            $filenameWithExt = $request->file('thumbnail')->getClientOriginalName();
            // Get just file name
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just extension
            $extension = $request->file('thumbnail')->getClientOriginalExtension();
            // Filename to store
            $filenameToStore = $filename . '_' . time() . '.' . $extension;
            // Upload image
            $path = $request->file('thumbnail')->storeAs('public/testimonials', $filenameToStore);
            // Save to DB
            $testimonial->thumbnail = $filenameToStore;
        }

        $testimonial->save();

        return redirect('/temoignages')->with('success', 'Témoignage modifié !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $testimonial = Testimonial::find($id);

        Storage::delete('public/testimonials/' . $testimonial->thumbnail);

        $testimonial->delete();

        return redirect('/temoignages')->with('success', 'Témoignage supprimé !');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;
use App\Prestation;
use App\Testimonial;

class PrestationsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('admin', ['except' => ['show']]);
    }

    /**
     * Show all prestations
     */
    public function show() {
        $prestations = Prestation::all();
        $testimonials = Testimonial::all();

        return view('pages.prestations')
            ->with('prestations', $prestations)
            ->with('testimonials', $testimonials);
    }

    /**
     * Show all prestations (admin side)
     */
    public function index() {
        $prestations = Prestation::all();

        return view('admin.prestations.index')->with('prestations', $prestations);
    }

    /**
     * Edit prestation
     */
    public function edit($id) {
        $prestation = Prestation::find($id);

        return view('admin.prestations.edit')->with('prestation', $prestation);
    }

    /**
     * Update prestation
     */
    public function update(Request $request, $id) {
        $this->validate($request, [
            'name' => 'required',
            'intro' => 'required',
            'thumbnail' => 'image|max:1999'
        ]);

        // Handle Thumbnail Upload
        if($request->hasFile('thumbnail')) {
            // Get extension
            $extension = $request->file('thumbnail')->getClientOriginalExtension();
            // File name to store
            $filenameToStore = $id . '.' . $extension;
            // Resize
            $thumb = Image::make($request->file('thumbnail'));

            $thumb->resize(null, 790, function ($constraint) {
                $constraint->aspectRatio();
            });

            // Delete old image
            Storage::delete('storage/prestations/' . $filenameToStore);

            $thumb->save('storage/prestations/' . $filenameToStore);
        }

        // Handle PDF Upload
        if($request->hasFile('pdf')) {
            // Delete old pdf
            Storage::delete('public/pdf/formule.pdf');

            $path = $request->file('pdf')->storeAs('public/pdf/', 'formule.pdf');
        }

        $prestation = Prestation::find($id);
        $prestation->name = $request->input('name');
        $prestation->description = $request->input('intro');
        $prestation->price = $request->input('price');
        $prestation->save();

        return redirect('/admin/prestations')->with('success', 'Prestation modifié !');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;
use App\About;

class AboutController extends Controller
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

    public function edit() {
        $about = About::first();

        return view('admin.about.edit')->with('about', $about);
    }

    public function update(Request $request) {
        $this->validate($request, [
            'body' => 'required'
        ]);

        // Handle File Upload
        if($request->hasFile('photo')) {
            // Get filename
            $filename = $request->file('photo')->getClientOriginalName();
            // Resize & save thumbnail
            $thumb = Image::make($request->file('photo'));

            $thumb->resize(null, 1000, function ($constraint) {
                $constraint->aspectRatio();
            });

            $thumb->save('storage/about/' . $filename);
        }

        $about = About::first();
        $about->body = $request->input('body');
        if($request->hasFile('photo')) {
            $about->photo = $filename;
        }
        $about->save();

        return redirect('/about')->with('success', 'Page modifié !');
    }
}

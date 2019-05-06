<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Album;
use App\Photo;

class PhotosController extends Controller
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

    public function index($id) {
        $album = Album::find($id);
        $photos = Photo::where('albumId', $album->id)->get();

        return view('admin.albums.photos')
            ->with('album', $album)
            ->with('photos', $photos);
    }

    public function addPhotos(Request $request) {
        $albumId = $request->input('albumId');

        if ($request->hasFile('photos')) {
            foreach ($request->photos as $photo) {
                $filename = $photo->getClientOriginalName();

                $directory = 'public/photos/' . $albumId;

                $path = $photo->storeAs($directory, $filename);

                $photoToSave = new Photo;
                $photoToSave->albumId = $albumId;
                $photoToSave->photo = $filename;
                $photoToSave->save();
            }

            return redirect('/photos/' . $albumId)->with('success', 'Photos ajoutées !');
        } else {
            return redirect('/photos/' . $albumId)->with('error', 'Aucun fichier séléctionné...');
        }
    }

    public function destroy($id) {
        $photo = Photo::find($id);
        
        // Delete photo from Storage
        Storage::delete('public/photos/' . $photo->albumId . '/' . $photo->photo);

        // Delete photo from DB
        $photo->delete();

        return back()->with('success', 'Photo supprimé !');
    }
}

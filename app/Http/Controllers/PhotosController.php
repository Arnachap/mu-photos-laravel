<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;
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
        $photos = Photo::where('albumId', $album->id)->orderBy('position')->get();

        return view('admin.albums.photos')
            ->with('album', $album)
            ->with('photos', $photos);
    }

    public function addPhotos(Request $request) {
        $albumId = $request->input('albumId');

        if ($request->hasFile('photos')) {
            foreach ($request->photos as $photo) {
                // Save photo
                $filename = $photo->getClientOriginalName();

                $directory = 'public/photos/' . $albumId;

                $path = $photo->storeAs($directory, $filename);

                // Make small thumbnail
                $thumb = Image::make($photo);

                $thumb->resize(null, 1000, function ($constraint) {
                    $constraint->aspectRatio();
                });

                $thumb->save('storage/photos/' . $albumId . '/thumb_' . $filename);

                // Save to DB
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

        // Delete thumb from Storage
        Storage::delete('public/photos/' . $photo->albumId . '/thumb_' . $photo->photo);

        // Delete photo from DB
        $photo->delete();

        return back()->with('success', 'Photo supprimé !');
    }

    /*
    *   Sort album photos
    */
    public function sort(Request $request) {
        foreach ($request->id as $index => $id) {
            $photo = Photo::find($id);
            $photo->position = $index;
            $photo->save();
        }

        return redirect('/photos/' . $photo->albumId)->with('success', 'Ordre des photos sauvegarder !');
    }
}
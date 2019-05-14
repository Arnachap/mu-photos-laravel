<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use App\PrivatePhoto;
use App\PrivateAlbum;

class PrivatePhotosController extends Controller
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
        $album = PrivateAlbum::find($id);
        $photos = PrivatePhoto::where('albumId', $album->id)->get();

        return view('admin.privateAlbums.photos')
            ->with('album', $album)
            ->with('photos', $photos);
    }

    public function addPhotos(Request $request) {
        $albumId = $request->input('albumId');

        if ($request->hasFile('photos')) {
            foreach ($request->photos as $photo) {
                $filename = $photo->getClientOriginalName();

                $directory = 'public/private-photos/' . $albumId;

                $path = $photo->storeAs($directory, $filename);

                $photoToSave = new PrivatePhoto;
                $photoToSave->albumId = $albumId;
                $photoToSave->photo = $filename;
                $photoToSave->save();
            }

            return redirect('/photos-clients/' . $albumId)->with('success', 'Photos ajoutées !');
        } else {
            return redirect('/photos-clients/' . $albumId)->with('error', 'Aucun fichier séléctionné...');
        }
    }

    public function addArchive(Request $request) {
        $albumId = $request->input('albumId');
        $extension = '.' . $request->file('archive')->getClientOriginalExtension();

        Storage::putFileAs('public/archives/' . $albumId, $request->file('archive'), $albumId . $extension);

        $album = PrivateAlbum::find($albumId);
        $album->archive = $albumId . $extension;
        $album->save();

        return redirect('/photos-clients/' . $albumId)->with('success', 'Archive ajoutées !');
    }

    public function destroy($id) {
        $photo = PrivatePhoto::find($id);
        
        // Delete photo from Storage
        Storage::delete('public/private-photos/' . $photo->albumId . '/' . $photo->photo);

        // Delete photo from DB
        $photo->delete();

        return back()->with('success', 'Photo supprimé !');
    }
}

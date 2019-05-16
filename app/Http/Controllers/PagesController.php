<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slide;
use App\Album;
use App\Photo;

class PagesController extends Controller
{
    public function index() {
        // Get slides
        $slides = Slide::orderBy('position')->get();

        // Get random photos from each category
        // Mariage
        $albumMariage = Album::where('category', 'le-mariage')->inRandomOrder()->first();
        $photoMariage = Photo::where('albumId', $albumMariage->id)->inRandomOrder()->first();
        // Bébé
        $albumBebe = Album::where('category', 'les-premiers-jours')->inRandomOrder()->first();
        $photoBebe = Photo::where('albumId', $albumBebe->id)->inRandomOrder()->first();
        // Amoureux
        $albumAmoureux = Album::where('category', 'en-amoureux')->inRandomOrder()->first();
        $photoAmoureux = Photo::where('albumId', $albumAmoureux->id)->inRandomOrder()->first();
        // Grossess
        $albumGrossesse = Album::where('category', 'en-attendant-bebe')->inRandomOrder()->first();
        $photoGrossesse = Photo::where('albumId', $albumGrossesse->id)->inRandomOrder()->first();
        // Sport
        $albumSport = Album::where('category', 'sport')->inRandomOrder()->first();
        $photoSport = Photo::where('albumId', $albumSport->id)->inRandomOrder()->first();

        return view('pages.index')
            ->with('slides', $slides)
            ->with('photoMariage', $photoMariage)
            ->with('photoBebe', $photoBebe)
            ->with('photoAmoureux', $photoAmoureux)
            ->with('photoGrossesse', $photoGrossesse)
            ->with('photoSport', $photoSport);
    }
}

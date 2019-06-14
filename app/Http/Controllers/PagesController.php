<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slide;
use App\Album;
use App\Photo;
use App\Testimonial;

class PagesController extends Controller
{
    public function index() {
        // Get slides
        $slides = Slide::orderBy('position')->get();

        // Get random photos from each category
        // Mariage
        $albumMariage = Album::where('category', 'le-mariage')->inRandomOrder()->first();

        if (empty($albumMariage)) {
            $photoMariage = new Photo;
            $photoMariage->albumId = 'default';
            $photoMariage->photo = 'mariage.jpg';
        } else {
            $photoMariage = Photo::where('albumId', $albumMariage->id)->inRandomOrder()->first();
        }

        // Bébé
        $albumBebe = Album::where('category', 'les-premiers-jours')->inRandomOrder()->first();

        if (empty($albumBebe)) {
            $photoBebe = new Photo;
            $photoBebe->albumId = 'default';
            $photoBebe->photo = 'bebe.jpg';
        } else {
            $photoBebe = Photo::where('albumId', $albumBebe->id)->inRandomOrder()->first();
        }

        // Amoureux
        $albumAmoureux = Album::where('category', 'en-amoureux')->inRandomOrder()->first();

        if (empty($albumAmoureux)) {
            $photoAmoureux = new Photo;
            $photoAmoureux->albumId = 'default';
            $photoAmoureux->photo = 'amoureux.jpg';
        } else {
            $photoAmoureux = Photo::where('albumId', $albumAmoureux->id)->inRandomOrder()->first();
        }

        // Grossess
        $albumGrossesse = Album::where('category', 'en-attendant-bebe')->inRandomOrder()->first();

        if (empty($albumGrossesse)) {
            $photoGrossesse = new Photo;
            $photoGrossesse->albumId = 'default';
            $photoGrossesse->photo = 'grossesse.jpg';
        } else {
            $photoGrossesse = Photo::where('albumId', $albumGrossesse->id)->inRandomOrder()->first();
        }

        // Sport
        $albumSport = Album::where('category', 'sport')->inRandomOrder()->first();

        if (empty($albumSport)) {
            $photoSport = new Photo;
            $photoSport->albumId = 'default';
            $photoSport->photo = 'sport.jpg';
        } else {
            $photoSport = Photo::where('albumId', $albumSport->id)->inRandomOrder()->first();
        }

        return view('pages.index')
            ->with('slides', $slides)
            ->with('photoMariage', $photoMariage)
            ->with('photoBebe', $photoBebe)
            ->with('photoAmoureux', $photoAmoureux)
            ->with('photoGrossesse', $photoGrossesse)
            ->with('photoSport', $photoSport);
    }

    public function about() {
        $testimonials = Testimonial::all();

        return view('pages.about')->with('testimonials', $testimonials);
    }
}

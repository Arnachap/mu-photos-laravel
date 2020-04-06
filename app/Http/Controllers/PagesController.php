<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slide;
use App\Album;
use App\Photo;
use App\Testimonial;
use App\About;

class PagesController extends Controller
{
    public function index() {
        // Get slides
        $slides = Slide::orderBy('position')->get();
        $testimonials = Testimonial::all();

        return view('pages.index')
            ->with('slides', $slides)
            ->with('testimonials', $testimonials);
    }

    public function about() {
        $about = About::first();
        $testimonials = Testimonial::all();

        return view('pages.about')
        ->with('about', $about)
        ->with('testimonials', $testimonials);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slide;

class PagesController extends Controller
{
    public function index() {
        $slides = Slide::orderBy('position')->get();

        return view('pages.index')->with('slides', $slides);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Album;

class PagesController extends Controller
{
    public function index() {
        return view('pages.index');
    }

    public function about() {
        return view('pages.about');
    }

    public function prestations() {
        return view('pages.prestations');
    }
    
    public function contact() {
        return view('pages.contact');
    }
    
    public function login() {
        if (auth()->user()) {
            return redirect('/client');
        }

        return view('auth.login');
    }
    
    public function gallery($categoryName) {
        // Get category details
        $categories = Category::where('name', $categoryName)->get();

        // Use foreach as a simple object to array converter
        foreach ($categories as $category) {
            // Get albums from this category
            $albums = Album::where('category', $category->name)->get();

            return view('albums.gallery')
                ->with('albums', $albums)
                ->with('category', $category);
        }
    }
}

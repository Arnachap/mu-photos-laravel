<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Album;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function dashboard() {
        return view('admin.dashboard');
    }

    public function galleries() {
        $categories = Category::all();
        $albums = Album::all();

        return view('admin.galleries')
            ->with('categories', $categories)
            ->with('albums', $albums);
    }
}

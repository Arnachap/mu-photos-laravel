<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Album;
use App\User;
use App\PrivateAlbum;

class AdminController extends Controller
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

    public function dashboard() {
        return view('admin.dashboard');
    }

    public function albums() {
        $categories = Category::all();
        $albums = Album::all();

        return view('admin.albums.index')
            ->with('categories', $categories)
            ->with('albums', $albums);
    }

    public function clients() {
        $users = User::all();
        $albums = PrivateAlbum::all();

        return view('admin.clients.index')
            ->with('users', $users)
            ->with('albums', $albums);
    }
}

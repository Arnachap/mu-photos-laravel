<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PrivateAlbum;
use App\PrivatePhoto;

class ClientsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(auth()->user()->isAdmin) {
            return redirect('/admin');
        }

        $user = auth()->user();
        $album = PrivateAlbum::where('userId', $user->id)->first();
        if ($album) {
            $photos = PrivatePhoto::where('albumId', $album->id)->orderBy('position')->get();
    
            return view('clients.index')
                ->with('user', $user)
                ->with('album', $album)
                ->with('photos', $photos);
        } else {
            return view('clients.noAlbum');
        }
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PrivateAlbum;
use App\User;

class PrivateAlbumsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('admin')->except('show');
        $this->middleware('auth')->only('show');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $albums = PrivateAlbum::all();
        $users = User::all();

        return view('admin.privateAlbums.index')
            ->with('albums', $albums)
            ->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::where('isAdmin', null)
            ->get()
            ->pluck('name', 'id');

        return view('admin.privateAlbums.create')->with('users', $users);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'userId' => 'required'
        ]);

        $album = new PrivateAlbum;
        $album->title = $request->input('title');
        $album->userId = $request->input('userId');
        $album->save();

        return redirect('/albums-clients')->with('success', 'Album client créé !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $album = PrivateAlbum::find($id);

        $users = User::where('isAdmin', null)
            ->get()
            ->pluck('name', 'id');

        return view('admin.privateAlbums.edit')
        ->with('album', $album)
        ->with('users', $users);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'userId' => 'required'
        ]);

        $album = PrivateAlbum::find($id);
        $album->title = $request->input('title');
        $album->userId = $request->input('userId');
        $album->save();

        return redirect('/albums-clients')->with('success', 'Album client modifié !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $album = PrivateAlbum::find($id);

        $album->delete();

        return redirect('/albums-clients')->with('success', 'Album client supprimé !');
    }
}

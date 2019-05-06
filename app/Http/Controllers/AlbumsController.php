<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Album;
use App\Category;

class AlbumsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('admin', ['except' => ['show', 'category']]);
    }

    /**
     * Show the category with all albums connected to it.
     *
     * @return \Illuminate\Http\Response
     */
    public function category($categoryName)
    {
        // Get category details
        $categories = Category::where('name', $categoryName)->get();

        // Use foreach as a simple object to array converter
        foreach ($categories as $category) {
            // Get albums from this category
            $albums = Album::where('category', $category->name)->get();

            return view('pages.category')
                ->with('albums', $albums)
                ->with('category', $category);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.albums.create');
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
            'category' => 'required'
        ]);

        $album = new Album;
        $album->title = $request->input('title');
        $album->intro = $request->input('intro');
        $album->category = $request->input('category');
        $album->save();

        return redirect('/admin/albums')->with('success', 'Album ajouté !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $album = Album::find($id);

        return view('pages.album')->with('album', $album);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $album = Album::find($id);

        return view('admin.albums.edit')->with('album', $album);
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
            'category' => 'required'
        ]);

        $album = Album::find($id);
        $album->title = $request->input('title');
        $album->intro = $request->input('intro');
        $album->category = $request->input('category');
        $album->save();

        return redirect('/admin/albums')->with('success', 'Album modifié !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $album = Album::find($id);
        $album->delete();

        return redirect('/admin/albums')->with('success', 'Album supprimé !');
    }
}

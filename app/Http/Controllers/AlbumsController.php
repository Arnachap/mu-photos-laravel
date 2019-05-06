<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
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
            'category' => 'required',
            'thumbnail' => 'image|required|max:1999'
        ]);

        // Handle File Upload
        // Get filename with extension
        $filenameWithExt = $request->file('thumbnail')->getClientOriginalName();
        // Get just file name
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        // Get just extension
        $extension = $request->file('thumbnail')->getClientOriginalExtension();
        // Filename to store
        $filenameToStore = $filename . '_' . time() . '.' . $extension;
        // Upload image
        $path = $request->file('thumbnail')->storeAs('public/thumbnails', $filenameToStore);

        $album = new Album;
        $album->title = $request->input('title');
        $album->intro = $request->input('intro');
        $album->category = $request->input('category');
        $album->thumbnail = $filenameToStore;
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
            'category' => 'required',
            'thumbnail' => 'image|max:1999'
        ]);

        // Handle File Upload
        if($request->hasFile('thumbnail')) {
            // Get filename with extension
            $filenameWithExt = $request->file('thumbnail')->getClientOriginalName();
            // Get just file name
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just extension
            $extension = $request->file('thumbnail')->getClientOriginalExtension();
            // Filename to store
            $filenameToStore = $filename . '_' . time() . '.' . $extension;
            // Upload image
            $path = $request->file('thumbnail')->storeAs('public/thumbnails', $filenameToStore);
        }

        $album = Album::find($id);
        if($request->hasFile('thumbnail')) {
            // Delete old image
            Storage::delete('public/thumbnails/' . $album->thumbnail);
            // Save new file
            $album->thumbnail = $filenameToStore;
        }
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

        // Delete thumbnail
        Storage::delete('public/thumbnails/' . $album->thumbnail);

        // Delete album
        $album->delete();

        return redirect('/admin/albums')->with('success', 'Album supprimé !');
    }
}

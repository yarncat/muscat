<?php

namespace App\Http\Controllers;

use App\Http\Requests\AlbumRequest;
use App\Models\Album;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AlbumController extends Controller
{
    /**
     * Restrict access for unauthorized users.
     */
    public function __construct()
    {
        $this->middleware('auth')->except('index', 'search', 'show');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $albums = Album::listingResource()->paginate(10);

        return view('index', compact('albums'));
    }

    /**
     * Display a listing of the search results.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        if ($request->search) {
            $search = $request->search;
            $albums = Album::listingResource()->search($search)->get();

            return view('index', compact('albums', 'search'));
        }

        return redirect()->route('albums.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AlbumRequest $request)
    {
        $album = Album::create([
            'title' => $request->title,
            'artist' => $request->artist,
            'release' => $request->release,
            'label' => $request->label
        ]);

        if ($request->hasFile('image_link')) {
            $folder = $request->artist;
            $url = $request->file('image_link')->store("upload/{$folder}", "public");
            $album->image_link = $url;
            $album->save();
        }

        return redirect()->route('albums.edit', $album->id)
                         ->cookie("tab", '2', 0.1)
                         ->with('success', 'Альбом успешно сохранён в каталог, время заполнить трек-лист!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $album = Album::findOrFail($id);
        $tracks = $album->tracks('track_title', 'duration')->get();

        return view('show', compact('album', 'tracks'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $album = Album::findOrFail($id);
        $tracks = $album->tracks()->get();

        return view('edit', compact('album', 'tracks'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AlbumRequest $request, $id)
    {
        $album = Album::findOrFail($id);

        $album->title = $request->title;
        $album->artist = $request->artist;
        $album->release = $request->release;
        $album->label = $request->label;

        if ($request->hasFile('image_link')) {
            $folder = $request->artist;
            $url = $request->file('image_link')->store("upload/{$folder}", "public");
            Storage::disk('public')->delete($album->image_link);
            $album->image_link = $url;
        }

        $album->update();

        return redirect()->route('albums.show', $id)->with('success', 'Данные успешно обновлены');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $album = Album::findOrFail($id);
        Storage::disk('public')->delete($album->image_link);
        $album->delete();

        return redirect()->route('albums.index')->with('success', 'Альбом удалён из каталога!');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Album;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $album = Album::latest()->paginate(5);
        return view('album.index', compact('album'))->with('i', (request()->input('page', 1) -1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('album.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'NamaAlbum' => 'required',
            'Deskripsi' => 'required',
            'TanggalDibuat' => 'required',
            'UserID' => 'required'
        ]);
        Album::create($request->all());

        return redirect()->route('album.index')->with('succes','Data Berhasil di Input');
    }

    /**
     * Display the specified resource.
     */
    public function show(Album $album)
    {
        return view('album.show',compact('album'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Album $album)
    {
        return view('album.edit', compact('album'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Album $album)
    {
        $request->validate([
            'NamaAlbum' => 'required',
            'Deskripsi' => 'required',
            'TanggalDibuat' => 'required',
            'UserID' => 'required'
        ]);

        $album->update($request->all());
        return redirect()->route('album.index')->with('succes','Data Berhasil di Update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Album $album)
    {
        $album->delete();

        return redirect()->route('album.index')->with('succes','Data Berhasil di Hapus');
    }
}

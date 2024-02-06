<?php

namespace App\Http\Controllers;

use App\Models\Foto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class FotoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $foto = Foto::latest()->paginate(5);
        return view ('foto.index',compact('foto'))->with('i', (request()->input('page', 1) -1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('foto.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'JudulFoto' => 'required',
            'DeskripsiFoto' => 'required',
            'TanggalUnggah' => 'required',
            'LokasiFile' => 'required',
            'AlbumID' => 'required',
            'UserID' => 'required',
        ]);
        Foto::create($request->all());

        return redirect()->route('foto.index')->with('success','Data Berhasil di Input');
    }

    /**
     * Display the specified resource.
     */
    public function show(Foto $foto)
    {
        return view('foto.show', compact('foto'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Foto $foto)
    {
        return view('foto.edit', compact('foto'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Foto $foto)
    {
        $request->validate([
            'JudulFoto' => 'required',
            'DeskripsiFoto' => 'required',
            'TanggalUnggah' => 'required',
            'LokasiFile' => 'required',
            'AlbumID' => 'required',
            'UserID' => 'required',
        ]);
        $foto->update($request->all());

        return redirect()->route('foto.index')->with('success','Data Berhasil di Update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Foto $foto)
    {
        $foto->delete();

        return redirect()->route('foto.index')->with('success','Data Berhasil di Hapus');
    }
}

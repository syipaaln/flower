<?php

namespace App\Http\Controllers;

use App\Models\KomentarFoto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class KomentarFotoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $komentarfoto = KomentarFoto::latest()->paginate(5);
        return view ('komentarfoto.index',compact('komentarfoto'))->with('i', (request()->input('page', 1) -1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('komentarfoto.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'FotoID' => 'required',
            'UserID' => 'required',
            'IsiKomentar' => 'required',
            'TanggalKomentar' => 'required',
        ]);
        KomentarFoto::create($request->all());

        return redirect()->route('komentarfoto.index')->with('succes','Data Berhasil di Input');
    }

    /**
     * Display the specified resource.
     */
    public function show(KomentarFoto $komentarfoto)
    {
        return view('komentarfoto.show',compact('komentarfoto'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(KomentarFoto $komentarfoto)
    {
        return view('komentarfoto.edit', compact('komentarfoto'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, KomentarFoto $komentarfoto)
    {
        $request->validate([
            'FotoID' => 'required',
            'UserID' => 'required',
            'IsiKomentar' => 'required',
            'TanggalKomentar' => 'required',
        ]);
        $komentarfoto->update($request->all());

        return redirect()->route('komentarfoto.index')->with('succes','Data Berhasil di Input');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(KomentarFoto $komentarfoto)
    {
        $komentarfoto->delete();

        return redirect()->route('komentarfoto.index')->with('succes','Data Berhasil di Hapus');
    }
}

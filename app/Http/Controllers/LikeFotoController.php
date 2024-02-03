<?php

namespace App\Http\Controllers;

use App\Models\LikeFoto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LikeFotoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $likefoto = LikeFoto::latest()->paginate(5);
        return view ('likefoto.index',compact('likefoto'))->with('i', (request()->input('page', 1) -1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('likefoto.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'FotoID' => 'required',
            'UserID' => 'required',
            'TanggalLike' => 'required',
        ]);
        LikeFoto::create($request->all());

        return redirect()->route('likefoto.index')->with('succes','Data Berhasil di Input');
    }

    /**
     * Display the specified resource.
     */
    public function show(LikeFoto $likefoto)
    {
        return view('likefoto.show',compact('likefoto'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(LikeFoto $likefoto)
    {
        return view('likefoto.edit', compact('likefoto'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, LikeFoto $likefoto)
    {
        $request->validate([
            'FotoID' => 'required',
            'UserID' => 'required',
            'TanggalLike' => 'required',
        ]);
        $likefoto->update($request->all());

        return redirect()->route('likefoto.index')->with('succes','Data Berhasil di Input');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LikeFoto $likefoto)
    {
        $likefoto->delete();

        return redirect()->route('likefoto.index')->with('succes','Data Berhasil di Hapus');
    }
}

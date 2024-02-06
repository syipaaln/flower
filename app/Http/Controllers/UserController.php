<?php

namespace App\Http\Controllers;

use App\Models\Userr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Userr::latest()->paginate(5);
        return view('user.index', compact('user'))->with('i', (request()->input('page', 1) -1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'Username' => 'required',
            'Password' => 'required',
            'Email' => 'required',
            'NamaLengkap' => 'required',
            'Alamat' => 'required'
        ]);
        Userr::create($request->all());

        return redirect()->route('user.index')->with('succes','Data Berhasil di Input');
    }

    /**
     * Display the specified resource.
     */
    public function show(Userr $user)
    {
        return view('user.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Userr $user)
    {
        return view('user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Userr $user)
    {
        $request->validate([
            'Username' => 'required',
            'Password' => 'required',
            'Email' => 'required',
            'NamaLengkap' => 'required',
            'Alamat' => 'required'
        ]);

        $user->update($request->all());
        return redirect()->route('user.index')->with('succes','Data Berhasil di Update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Userr $user)
    {
        $user->delete();

        return redirect()->route('user.index')->with('succes','Data Berhasil di Hapus');
    }
}

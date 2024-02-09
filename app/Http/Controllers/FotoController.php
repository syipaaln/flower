<?php

namespace App\Http\Controllers;

use App\Models\Foto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
            'picture' => ['mimes:jpg,png,jpeg', 'image', 'max:2048'],
            'JudulFoto' => 'required',
            'DeskripsiFoto' => 'required',
            'TanggalUnggah' => 'required',
            'LokasiFile' => 'required',
            'AlbumID' => 'required',
            'UserID' => 'required',
        ]);
        // Foto::create($request->all());

        // return redirect()->route('foto.index')->with('success','Data Berhasil di Input');

        $params = $request->all();

        if ($request->hasFile('picture')) {
            $path = $request->file('picture')->store('uploads');
            $params['picture'] = $path;
        }

        $foto = Foto::create($params);

        if ($foto) {
            // $foto->categories()->sync($params['category_ids']);

            return redirect(route('foto.index'))->with('success','Added!');
        }

        return redirect(route('foto.index'))->with('error','Gagal!');

        // $id = $request->get('id');
        // if($id){
        //     $foto = Foto::find($id);
        // } else {
        //     $foto = new Foto;
        // }
        // if($request->hasFile('picture')){
        //     $picture = $request->file('picture');
        //     $request->validate([
        //         'picture' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        //     ]);
        //     $imageName = time() . '.' . $picture->getClientOriginalExtension();
        //     $destinationPath = 'image/';
        //     $picture->move($destinationPath, $imageName);
        //     $foto->picture = $imageName;
        // }
        // $foto->JudulFoto = $request->JudulFoto;
        // $foto->DeskripsiFoto = $request->DeskripsiFoto;
        // $foto->TanggalUnggah = $request->TanggalUnggah;
        // $foto->LokasiFile = $request->LokasiFile;
        // $foto->AlbumID = $request->AlbumID;
        // $foto->UserID = $request->UserID;
        // $foto->save();
        // return redirect()->route('foto.index')->with('success', 'Data Berhasil di Input');
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
            'picture' => ['mimes:jpg,png,jpeg', 'image', 'max:2048']
        ]);

        $params = $request->all();

        if ($request->hasFile('picture')) {
            $path = $request->file('picture')->store('uploads');
            $params['picture'] = $path;
            
            if ($foto->picture) {
                Storage::delete($foto->picture);
            }
        }

        if ($foto->update($params)) {
            // $product->categories()->sync($params['category_ids']);

            return redirect(route('foto.index'))->with('success','Updated!');
        }

        // $foto->update($request->all());
        // Mengupdate data menu tanpa memperbarui foto jika tidak diupload
        // $foto->update([
        //     'JudulFoto' => $request->JudulFoto,
        //     'DeskripsiFoto' => $request->DeskripsiFoto,
        //     'TanggalUnggah' => $request->TanggalUnggah,
        //     'LokasiFile' => $request->LokasiFile,
        //     'AlbumID' => $request->AlbumID,
        //     'UserID' => $request->UserID,
        // ]);

        // // Cek apakah ada file foto yang diupload
        // if ($request->hasFile('picture')) {
        //     $picture = $request->file('picture');

        //     // Validasi foto baru
        //     $request->validate([
        //         'picture' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        //     ]);

        //     // Hapus foto lama (jika ada)
        //     if ($foto->picture) {
        //         unlink(public_path('image/' . $foto->picture));
        //     }

        //     // Simpan foto baru
        //     $imageName = time() . '.' . $picture->getClientOriginalExtension();
        //     $destinationPath = 'image/';
        //     $picture->move($destinationPath, $imageName);
        //     $foto->update(['picture' => $imageName]);
        // }

        // return redirect()->route('foto.index')->with('success','Data Berhasil di Update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Foto $foto)
    {
        // $foto->delete();

        // return redirect()->route('foto.index')->with('success','Data Berhasil di Hapus');

        // $product = Product::findOrFail($id);
        // $product->categories()->detach();

        if ($foto->picture) {
            Storage::delete($foto->picture);
        }

        if ($foto->delete()) {
            return redirect(route('foto.index'))->with('success','Deleted!');
        }

        return redirect(route('foto.index'))->with('error','Sorry, unable to delete this!');
    }
}

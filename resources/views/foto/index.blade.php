@extends('template')

@section('content')
    <div class="row mt-5 mb-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2>Data Foto</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-success" href="{{ route('foto.create') }}"> Input Foto</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('succes'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th width="20px" class="text-center">No</th>
            <th width="280px"class="text-center">Judul Foto</th>
            <th width="280px"class="text-center">Deskripsi Foto</th>
            <th width="280px"class="text-center">Tanggal Unggah</th>
            <th width="200px"class="text-center">Lokasi File</th>
            <th width="100px"class="text-center">Album</th>
            <th width="100px"class="text-center">User</th>
            <th width="280px"class="text-center">Action</th>
        </tr>
        @foreach ($foto as $foto)
        <tr>
            <td class="text-center">{{ ++$i }}</td>
            <td>{{ $foto->JudulFoto }}</td>
            <td>{{ $foto->DeskripsiFoto }}</td>
            <td>{{ $foto->TanggalUnggah }}</td>
            <td>{{ $foto->LokasiFile }}</td>
            <td>{{ $foto->AlbumID }}</td>
            <td>{{ $foto->UserID }}</td>
            <td class="text-center">
                <form action="{{ route('foto.destroy',$foto->FotoID) }}" method="POST">

                    <a class="btn btn-info btn-sm" href="{{ route('foto.show',$foto->FotoID) }}">Show</a>

                    <a class="btn btn-primary btn-sm" href="{{ route('foto.edit',$foto->FotoID) }}">Edit</a>

                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

@endsection
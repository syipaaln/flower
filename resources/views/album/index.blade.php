@extends('template')

@section('content')
    <div class="row mt-5 mb-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2>Data Album</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-success" href="{{ route('album.create') }}"> Input Album</a>
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
            <th width="280px"class="text-center">Nama Album</th>
            <th width="280px"class="text-center">Deskripsi</th>
            <th width="280px"class="text-center">Tanggal Dibuat</th>
            <th width="280px"class="text-center">User</th>
            <th width="280px"class="text-center">Action</th>
        </tr>
        @foreach ($album as $album)
        <tr>
            <td class="text-center">{{ ++$i }}</td>
            <td>{{ $album->NamaAlbum }}</td>
            <td>{{ $album->Deskripsi }}</td>
            <td>{{ $album->TanggalDibuat }}</td>
            <td>{{ $album->UserID }}</td>
            <td class="text-center">
                <form action="{{ route('album.destroy',$album->AlbumID) }}" method="POST">

                    <a class="btn btn-info btn-sm" href="{{ route('album.show',$album->AlbumID) }}">Show</a>

                    <a class="btn btn-primary btn-sm" href="{{ route('album.edit',$album->AlbumID) }}">Edit</a>

                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

@endsection
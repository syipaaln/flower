@extends('template')

@section('content')
    <div class="row mt-5 mb-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2>Data Komentar Foto</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-success" href="{{ route('komentarfoto.create') }}"> Input Komentar Foto</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th width="20px" class="text-center">No</th>
            <th width="280px"class="text-center">Foto ID</th>
            <th width="280px"class="text-center">User</th>
            <th width="280px"class="text-center">Isi Komentar</th>
            <th width="280px"class="text-center">Tanggal Komentar</th>
            <th width="280px"class="text-center">Action</th>
        </tr>
        @foreach ($komentarfoto as $komentarfoto)
        <tr>
            <td class="text-center">{{ ++$i }}</td>
            <td>{{ $komentarfoto->FotoID }}</td>
            <td>{{ $komentarfoto->UserID }}</td>
            <td>{{ $komentarfoto->IsiKomentar }}</td>
            <td>{{ $komentarfoto->TanggalKomentar }}</td>
            <td class="text-center">
                <form action="{{ route('komentarfoto.destroy',$komentarfoto->KomentarID) }}" method="POST">

                    <a class="btn btn-info btn-sm" href="{{ route('komentarfoto.show',$komentarfoto->KomentarID) }}">Show</a>

                    <a class="btn btn-primary btn-sm" href="{{ route('komentarfoto.edit',$komentarfoto->KomentarID) }}">Edit</a>

                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

@endsection
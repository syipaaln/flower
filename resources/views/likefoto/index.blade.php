@extends('template')

@section('content')
    <div class="row mt-5 mb-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2>Data Like Foto</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-success" href="{{ route('likefoto.create') }}"> Input Like Foto</a>
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
            <th width="280px"class="text-center">FotoID</th>
            <th width="280px"class="text-center">User ID</th>
            <th width="280px"class="text-center">Tanggal Dibuat</th>
            <th width="280px"class="text-center">Action</th>
        </tr>
        @foreach ($likefoto as $likefoto)
        <tr>
            <td class="text-center">{{ ++$i }}</td>
            <td>{{ $likefoto->FotoID }}</td>
            <td>{{ $likefoto->UserID }}</td>
            <td>{{ $likefoto->TanggalLike }}</td>
            <td class="text-center">
                <form action="{{ route('likefoto.destroy',$likefoto->LikeID) }}" method="POST">

                    <a class="btn btn-info btn-sm" href="{{ route('likefoto.show',$likefoto->LikeID) }}">Show</a>

                    <a class="btn btn-primary btn-sm" href="{{ route('likefoto.edit',$likefoto->LikeID) }}">Edit</a>

                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

@endsection
@extends('template')

@section('content')
    <div class="row mt-5 mb-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2>Data User</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-success" href="{{ route('user.create') }}"> Input User</a>
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
            <th width="150px"class="text-center">Username</th>
            <th width="200px"class="text-center">Password</th>
            <th width="280px"class="text-center">Email</th>
            <th width="280px"class="text-center">Nama Lengkap</th>
            <th width="280px"class="text-center">Alamat</th>
            <th width="310px"class="text-center">Action</th>
        </tr>
        @foreach ($user as $user)
        <tr>
            <td class="text-center">{{ ++$i }}</td>
            <td>{{ $user->Username }}</td>
            <td>{{ $user->Password }}</td>
            <td>{{ $user->Email }}</td>
            <td>{{ $user->NamaLengkap }}</td>
            <td>{{ $user->Alamat }}</td>
            <td class="text-center">
                <form action="{{ route('user.destroy',$user->UserID) }}" method="POST">

                    <a class="btn btn-info btn-sm" href="{{ route('user.show',$user->UserID) }}">Show</a>

                    <a class="btn btn-primary btn-sm" href="{{ route('user.edit',$user->UserID) }}">Edit</a>

                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

@endsection
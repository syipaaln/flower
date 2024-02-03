@extends('template')

@section('content')
    <div class="row mt-5 mb-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2>Edit Komentar Foto</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-secondary" href="{{ route('komentarfoto.index') }}"> Back</a>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('komentarfoto.update',$komentarfoto->KomentarID) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Foto ID:</strong>
                    <input type="text" name="FotoID" class="form-control" placeholder="Foto ID" value="{{ $komentarfoto->FotoID }}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>User:</strong>
                    <input type="text" name="UserID" class="form-control" placeholder="User ID" value="{{ $komentarfoto->UserID }}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Isi Komentar:</strong>
                    <textarea class="form-control" style="height:150px" name="IsiKomentar" placeholder="Isi Komentar">{{ $komentarfoto->IsiKomentar }}</textarea>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Tanggal Komentar:</strong>
                    <input type="date" name="TanggalKomentar" class="form-control" value="{{ $komentarfoto->TanggalKomentar }}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </div>

    </form>
@endsection
@extends('template')

@section('content')
    <div class="row mt-5 mb-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2>Edit Foto</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-secondary" href="{{ route('foto.index') }}"> Back</a>
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

    <form action="{{ route('foto.update',$foto->FotoID) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="mb-3">
                <label class="form-label">Picture</label><br>
                @if ($foto->picture)
                    <img src="{{ asset('storage/' . $foto->picture) }}" class="img-thumbnail" style="width: 20%" alt="">
                @else
                    <Span>No Picture</Span>
                @endif
                <input type="file" class="form-control" name="picture" value="" accept="image/*">
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Judul foto:</strong>
                    <input type="text" name="JudulFoto" class="form-control" value="{{ $foto->JudulFoto }}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Deskripsi Foto:</strong>
                    <textarea class="form-control" style="height:150px" name="DeskripsiFoto" placeholder="Deskripsi Foto">{{ $foto->DeskripsiFoto }}</textarea>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Tanggal Unggah:</strong>
                    <input type="date" name="TanggalUnggah" class="form-control" value="{{ $foto->TanggalUnggah }}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Lokasi File:</strong>
                    <input type="text" name="LokasiFile" class="form-control" value="{{ $foto->LokasiFile }}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Album:</strong>
                    <input type="text" name="AlbumID" class="form-control" value="{{ $foto->AlbumID }}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>User:</strong>
                    <input type="text" name="UserID" class="form-control" value="{{ $foto->UserID }}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </div>

    </form>
@endsection
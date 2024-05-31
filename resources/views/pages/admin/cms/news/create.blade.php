@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <form method="POST" action="{{ route('admin.cms.news.store') }}">
                @csrf
                <div class="mb-3">
                    <label for="gambar" class="form-label">Gambar</label>
                    <input id="gambar" name="gambar" type="file" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="judul" class="form-label">Judul Berita</label>
                    <input id="title" name="title" type="text" class="form-control" id="exampleFormControlInput1"
                        placeholder="Input Judul Berita" required>
                </div>
                <div class="mb-3">
                    <label for="deskripsi" class="form-label">Input Deskripsi Berita</label>
                    <textarea id="description" name="description" class="form-control" placeholder="Input Deskripsi Berita" rows="6"
                        required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Save</button>
                <a href="{{ route('admin.cms.news.index') }}" class="btn btn-secondary ms-2">Back</a>
            </form>
        </div>
    </div>
@endsection

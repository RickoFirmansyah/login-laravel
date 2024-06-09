@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <form method="POST" action="{{ route('admin.cms.news.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="image" class="form-label">Gambar</label>
                    <input id="image" name="image" type="file" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="title" class="form-label">Judul Berita</label>
                    <input id="title" name="title" type="text" class="form-control"
                        placeholder="Input Judul Berita" required>
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Input Deskripsi Berita</label>
                    <textarea id="description" name="description" class="form-control" placeholder="Input Deskripsi Berita" rows="6"
                        required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Save</button>
                {{-- <a href="{{ route('admin.cms.news.index') }}" class="btn btn-secondary ms-2">Back</a> --}}
            </form>
        </div>
    </div>
@endsection

@extends('layouts.app')

@section('content')
    <div class="py-4">
        <div class="row">
            <div class="col-md-12">
                <form method="POST" action="{{ route('admin.cms.news.store') }}" custom-action="true"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="image" class="form-label">Gambar</label>
                        <input id="image" name="image" type="file" class="form-control">
                        @if ($errors->has('image'))
                            <span class="text-danger">{{ $errors->first('image') }}</span>
                        @enderror
                </div>
                <div class="mb-3">
                    <label for="title" class="form-label">Judul Berita</label>
                    <input type="text" class="form-control" id="title" name="title"
                        placeholder="Masukkan Judul Berita" value='{{ old('title') }}' re>
                    @if ($errors->has('title'))
                        <span class="text-danger">{{ $errors->first('title') }}</span>
                    @enderror
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Deskripsi</label>
                <textarea name="description" id="description" cols="30" rows="10" class="form-control"
                    placeholder="Input Deskripsi Berita"></textarea>
                @if ($errors->has('description'))
                    <span class="text-danger">{{ $errors->first('description') }}</span>
                @enderror
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
</div>
</div>
@endsection

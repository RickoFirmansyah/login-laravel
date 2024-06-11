@extends('layouts.app')

@section('content')
    <div class="py-4">
        <div class="row">
            <div class="col-md-12">
                <form method="POST" action="{{ route('admin.cms.pengumuman.store') }}" custom-action="true">
                    @csrf
                    <div class="mb-3">
                        <label for="title" class="form-label">Judul Pengumuman</label>
                        <input type="text" class="form-control" id="title" name="title"
                            placeholder="Masukkan Judul Pengumuman" value='{{ old('title') }}'>
                        @if ($errors->has('title'))
                            <span class="text-danger">{{ $errors->first('title') }}</span>
                        @enderror
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Deskripsi Pengumuman</label>
                    <textarea name="description" id="description" cols="30" rows="10" class="form-control"
                        placeholder="Masukan Deskripsi Pengumuman"></textarea>
                    @if ($errors->has('description'))
                        <span class="text-danger">{{ $errors->first('description') }}</span>
                    @enderror
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('admin.cms.pengumuman.index') }}" class="btn btn-secondary ms-2">Kembali</a>
        </form>
    </div>
</div>
</div>
@endsection

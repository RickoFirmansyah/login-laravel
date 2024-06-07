@extends('layouts.app')

@section('content')
    <div class="py-4">
        <div class="row">
            <div class="col-md-12">
                <form method="POST" action="{{ route('admin.cms.news.update', $data->id) }}" enctype="multipart/form-data"
                    custom-action="true">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="image" class="form-label">Gambar</label>
                        <input id="image" name="image" type="file" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="title" class="form-label">Judul Berita</label>
                        <input type="text" class="form-control" id="title" name="title" placeholder="Enter name"
                            value="{{ $data->title }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Ubah Deskripsi Berita</label>
                        <textarea id="description" name="description" class="form-control" placeholder="Input Deskripsi Berita" rows="6"
                            required>{{ $data->description }}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        $(document).ready(function() {});
    </script>
@endpush

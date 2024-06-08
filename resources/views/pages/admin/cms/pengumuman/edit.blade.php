@extends('layouts.app')

@section('content')
    <div class="py-4">
        <div class="row">
            <div class="col-md-12">
                <form method="POST" action="{{ route('admin.cms.pengumuman.update', $pengumuman->id) }}" custom-action="true">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="title" class="form-label">Judul Pengumuman</label>
                        <input type="text" class="form-control" id="title" name="title"
                            placeholder="Masukan Judul Pengumuman" value="{{ $pengumuman->title }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Ubah Deskripsi Pengumuman</label>
                        <textarea id="description" name="description" class="form-control" placeholder="Input Deskripsi Pengumuman"
                            rows="6" required>{{ $pengumuman->description }}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{ route('admin.cms.pengumuman.index') }}" class="btn btn-secondary ms-2">Kembali</a>

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

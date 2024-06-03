@extends('layouts.app')

@section('content')
<div class="py-4">
    <div class="row">
        <div class="col-md-12">
            <form method="POST" action="{{ route('tahun.update', $user->id) }}" custom-action="true">
                @csrf
                @method('PUT')
                <input type="hidden" name="user_id" value="{{ $user->id }}">
                <div class="mb-3">
                    <label for="name" class="form-label">Tahun</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Isi Tahun Aktif"
                        value="{{ $user->tahun }}" required>
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">Tahun</label>
                    <select name="status" class="form-control">
                        <option value="Aktif" {{ $user->status == 'Aktif' ? 'selected' : '' }}>Aktif</option>
                        <option value="Non Aktif" {{ $user->status == 'Non Aktif' ? 'selected' : '' }}>Non Aktif
                        </option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Save</button>
                <a href="{{ route('tahun.index') }}" class="btn btn-secondary ms-2">Back</a>
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
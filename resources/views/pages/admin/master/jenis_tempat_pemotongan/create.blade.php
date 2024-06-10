@extends('layouts.app')

@section('content')
<div class="py-4">
    <div class="row">
        <div class="col-md-12">
            <form method="POST" action="{{ route('jenis-tempat.store') }}" custom-action="true">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Jenis Tempat Pemotongan</label>
                    <input type="text" class="form-control" id="name" name="jenis_kurban" placeholder="Jenis Tempat"
                        required>
                    @if ($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Save</button>
                <a href="{{ route('jenis-tempat.index') }}" class="btn btn-secondary ms-2">Back</a>
            </form>
        </div>
    </div>
</div>
@endsection
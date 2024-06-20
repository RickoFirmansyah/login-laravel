@extends('layouts.app')

@section('content')
<div class="py-4">
    <div class="row">
        <div class="col-md-12">
            <form method="POST" action="{{ route('import-petugas-pemantauan') }}" custom-action="true"
                enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label for="file" class="form-label">Data Petugas</label>
                    <input type="file" class="form-control" id="data" name="data" placeholder="Data Petugas">
                </div>
                <button type="submit" class="btn btn-primary">Save</button>
                <a href="{{ route('petugas-pemantauan.index') }}" class="btn btn-secondary ms-2">Back</a>
            </form>
        </div>
    </div>
</div>
@endsection
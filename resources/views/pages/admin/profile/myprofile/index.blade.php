@extends('layouts.app')

<link href="{{ asset('css/style-mprofile.css') }}" rel="stylesheet">
@section('content')
<div class="wrapper bg-white">
    <div class="d-flex align-items-start py-3 border-bottom">
        <img src="{{ asset('assets/images/profile/user-1.jpg') }}" class="rounded-circle" width="200" height="200" alt="" />
        {{-- <div class="pl-sm-4 pl-2" id="img-section">
            <b>Profile Photo</b>
            <form id="uploadForm" class="d-flex flex-column">
                <input type="file" id="fileInput" class="mb-2">
                <button type="button" class="btn btn-primary border"><b>Upload</b></button>
            </form>
        </div> --}}
    </div>
    <div class="py-2">
        <form>
            <div class="row py-2">
                <div class="col-md-6">
                    <label for="nama">Nama</label>
                    <input type="text" class="bg-light form-control"  id="nama" value='{{ $user->name }}'>
                </div>
                <div class="col-md-6">
                    <label for="email">Email</label>
                    <input type="email" class="bg-light form-control" id="email" value='{{ $user->email }}'>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection
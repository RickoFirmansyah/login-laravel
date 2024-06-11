@extends('layouts.app')

<link href="{{ asset('css/style-mprofile.css') }}" rel="stylesheet">

@section('content')
<div class="wrapper bg-white">
    <div class="d-flex align-items-start py-3 border-bottom">
        <img src="{{ asset('assets/images/profile/user-1.jpg') }}" class="rounded-circle" width="200" height="200" alt="" />
    </div>
    @if ($user->monitoringOfficer)
    <div class="py-2">
        <form>
            <div class="row py-2">
                <div class="col-md-6">
                    <label for="nama">Nama</label>
                    <input type="text" class="bg-light form-control" id="nama" value='{{ $user->name }}' readonly>
                </div>
                <div class="col-md-6">
                    <label for="email">Email</label>
                    <input type="email" class="bg-light form-control" id="email" value='{{ $user->email }}' readonly>
                </div>
            </div>
            <div class="row py-2">
                <div class="col-md-6">
                    <label for="officer_name">Nama Petugas</label>
                    <input type="text" class="bg-light form-control" id="officer_name" value='{{ $user->monitoringOfficer->name }}' readonly>
                </div>
                <div class="col-md-6">
                    <label for="address">Alamat</label>
                    <input type="text" class="bg-light form-control" id="address" value='{{ $user->monitoringOfficer->address }}' readonly>
                </div>
            </div>
            <div class="row py-2">
                <div class="col-md-6">
                    <label for="gender">Gender</label>
                    <input type="text" class="bg-light form-control" id="gender" value='{{ $user->monitoringOfficer->gender }}' readonly>
                </div>
                <div class="col-md-6">
                    <label for="phone_number">Nomor Telepon</label>
                    <input type="text" class="bg-light form-control" id="phone_number" value='{{ $user->monitoringOfficer->phone_number }}' readonly>
                </div>
            </div>
        </form>
    </div>
    @else
    <div class="py-2">
        <form>
            <div class="row py-2">
                <div class="col-md-6">
                    <label for="nama">Nama</label>
                    <input type="text" class="bg-light form-control" id="nama" value='{{ $user->name }}' readonly>
                </div>
                <div class="col-md-6">
                    <label for="email">Email</label>
                    <input type="email" class="bg-light form-control" id="email" value='{{ $user->email }}' readonly>
                </div>
            </div>
            <div class="row py-2">
                <div class="col-md-6">
                    <label for="officer_name">Nama Petugas</label>
                    <input type="text" class="bg-light form-control" id="officer_name" value='-' readonly>
                </div>
                <div class="col-md-6">
                    <label for="address">Alamat</label>
                    <input type="text" class="bg-light form-control" id="address" value='-' readonly>
                </div>
            </div>
            <div class="row py-2">
                <div class="col-md-6">
                    <label for="gender">Gender</label>
                    <input type="text" class="bg-light form-control" id="gender" value='-' readonly>
                </div>
                <div class="col-md-6">
                    <label for="phone_number">Nomor Telepon</label>
                    <input type="text" class="bg-light form-control" id="phone_number" value='-' readonly>
                </div>
            </div>
        </form>
    </div>
    @endif
    
</div>
@endsection

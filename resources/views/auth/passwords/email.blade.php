@extends('layouts.auth')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <a href="" class="text-nowrap logo-img text-start d-block mb-4">
                    <img src="{{ asset('assets/images/profile/foto login.jpg') }}" width="600" alt="">
                </a>
            </div>
            <div class="col-md-6">
                <h2>Lupa Kata Sandi</h2>
                <p class="mb-4">
                    Silahkan masukan email anda untuk<br>kami kirim tautan reset password.
                </p>
                <form>
                    <div class="form group mb-4">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <a href="javascript:void(0)" class="btn btn-dark-success w-100 py-3 mb-8">Kirim</a>
                    <a href="{{ route('login') }}" class="btn btn-light-primary text-primary w-100 py-3">Back to Login</a>
                </form>
            </div>
        </div>
    </div>
@endsection

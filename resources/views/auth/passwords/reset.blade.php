@extends('layouts.auth')

@section('content')
    <div class="container">
        <div class="row align-items-center justify-content-between">
            <div class="col-md-6">
                <img src="{{ asset('assets/images/profile/foto login.jpg') }}" width="600" alt="" class="img-fluid">
            </div>
            <div class="col-md-6">
                <div>
                    <h2>Lupa Kata Sandi</h2>
                    <p class="mb-4">
                        Masukkan kata sandi baru untuk <br>dibuat ulang.
                    </p>
                </div>
                <div class="form-group mb-4">
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf
                        <div class="form-group mb-4">
                            <input type="hidden" name="token" value="">

                            <div class="row mb-3">
                                <label for="email"
                                    class="col-md-8 col-form-label text-md-start">{{ __('Email Address') }}</label>

                                <div class="col-md-8">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password"
                                    class="col-md-8 col-form-label text-md-start">{{ __('Kata Sandi Baru') }}</label>

                                <div class="col-md-8">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password-confirm"
                                    class="col-md-8 col-form-label text-md-start">{{ __('Konfirmasi Kata Sandi') }}</label>

                                <div class="col-md-8">
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <div class="col-md-8 offset-md-0">
                                <button type="submit" class="w-100 py-3 mb-8 btn btn-dark-success">
                                    {{ __('Simpan Kata Sandi') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

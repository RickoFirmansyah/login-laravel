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
                Kata sandi anda telah selesai diubah.
            </p>

                    <form method="POST" action="{{ route('password.confirm') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="password" class="col-md-8 col-form-label text-md-start">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-0">
                                <button type="submit" class="w-100 py-3 mb-8 btn btn-dark-success">
                                    {{ __('Confirm Password') }}
                                </button>


                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

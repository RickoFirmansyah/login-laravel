@extends('layouts.auth')

@section('content')
    <div class="py-9">
        <div class="d-flex align-items-center justify-content-center w-100">
            <div class="row justify-content-center w-100">
                <div class="d-none d-lg-flex col-6 col justify-content-center login-bg-login">
                    <div class="d-flex flex-column align-items-center justify-content-center py-5 h-100 w-50">
                        <h1 class=" d-block fs-2qx fw-bolder text-center mx-auto">Selamat Datang di Sistem E-TERNAK</h1>
                        <div class=" d-block fs-base text-center text-black"></div>
                    </div>
                </div>
                <div class="col-md-8 col-lg-4">
                    <div class="card mb-0 login-card">
                        <div class="card-body">
                            <div class="row justify-content-center">
                                <div class="col-6 text-center">
                                    <h3 class="fw-bolder">Login</h3>
                                </div>
                            </div>
                            <form method="POST" action="{{ URL::to('login') }}" custom-action>
                                @csrf
                                <div class="mb-3">
                                    <x-atoms.form-label for="email_field">Email / Nomor Handphone</x-atoms.form-label>
                                    <x-atoms.input type="text" name="email" id="email_field"
                                        placeholder="Masukkan Email / Nomor Handphone" ssr />
                                </div>
                                <div class="mb-4">
                                    <x-atoms.form-label for="password_field">Password</x-atoms.form-label>
                                    <x-atoms.input type="password" name="password" id="password_field"
                                        placeholder="Masukkan Password" ssr />
                                </div>
                                <div class="d-flex align-items-center justify-content-between mb-4">
                                    <div class="form-check">
                                        <input class="form-check-input primary" type="checkbox" value=""
                                            id="flexCheckChecked" checked>
                                        <label class="form-check-label text-dark" for="flexCheckChecked">
                                            Keep me sign in
                                        </label>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary w-100 login-btn mb-4 rounded-2">Login</button>
                                <div class="d-flex align-items-center justify-content-center">
                                    <a class="text-primary fw-medium ms-2" href="auth/passwords/email">Forgot your
                                        password?</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

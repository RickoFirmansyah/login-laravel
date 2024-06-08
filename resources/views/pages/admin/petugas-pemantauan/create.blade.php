@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row ">
            <div class="col-md-12">
                <div class="card-header">Tambah Petugas Pemantauan</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('petugas-pemantauan.store') }}" custom-action="true">
                        @csrf

                        <div class="mb-3">
                            <label for="name" class="form-label">Nama Petugas</label>
                            <input type="text" class="form-control" id="name" name="name"
                                placeholder="Masukkan Nama Petugas" value='{{ old('name') }}'>
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="gender" class="form-label">Jenis Kelamin</label>
                            <select name="gender" id="gender" class='form-select'>
                                <option value="" selected disabled>Pilih Jenis Kelamin</option>
                                <option value="Laki-laki" {{ old('gender') == 'Laki-laki' ? 'selected' : '' }}>Laki-laki
                                </option>
                                <option value="perempuan" {{ old('gender') == 'perempuan' ? 'selected' : '' }}>perempuan
                                </option>
                            </select>
                            @error('gender')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email (Optional)</label>
                            <input type="email" class="form-control" id="email" name="email"
                                placeholder="Masukkan Email" value='{{ old('email') }}'>
                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="phone_number" class="form-label">Nomor Telepon</label>
                            <input type="number" class="form-control" id="phone_number" name="phone_number"
                                placeholder="Masukkan Nomor Telepon" value='{{ old('phone_number') }}'>
                            @error('phone_number')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="agency" class="form-label">Asal Instansi</label>
                            <input class='form-control' type="text" name="agency" id="agency"
                                placeholder="Masukkan Alamat Petugas" value='{{ old('agency') }}'>
                            @error('agency')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{ route('petugas-pemantauan.index') }}" class="btn btn-secondary ms-2">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

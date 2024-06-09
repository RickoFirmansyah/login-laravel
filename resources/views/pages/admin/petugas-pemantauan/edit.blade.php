@extends('layouts.app')

@section('content')
    <div class="py-4">
        <div class="row">
            <div class="col-md-12">
                <form method="POST" action="{{ route('petugas-pemantauan.update', $petugas->id) }}" custom-action="true">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="user_id" value="{{ $petugas->user_id }}">
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama Petugas<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="name" name="name"
                            placeholder="Masukkan Nama Petugas" value='{{ $petugas->name }}'>
                        @if ($errors->has('name'))
                            <span class="text-danger">{{ $errors->first('name') }}</span>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="gender" class="form-label">Jenis Kelamin<span class="text-danger">*</span></label>
                        <select name="gender" id="gender" class='form-select'>
                            <option value="" selected disabled>Pilih Jenis Kelamin</option>
                            <option value="Laki-laki"{{ $petugas->gender == 'Laki-laki' ? ' selected' : '' }}>Laki-laki
                            </option>
                            <option value="perempuan"{{ $petugas->gender == 'perempuan' ? ' selected' : '' }}>Perempuan
                            </option>
                        </select>
                        @if ($errors->has('gender'))
                            <span class="text-danger">{{ $errors->first('gender') }}</span>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email (Optional)</label>
                        <input type="email" class="form-control" id="email" name="email"
                            placeholder="Masukkan Email" value='{{ $petugas->email }}'>
                        @if ($errors->has('email'))
                            <span class="text-danger">{{ $errors->first('email') }}</span>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="phone_number" class="form-label">Nomer Telepon<span class="text-danger">*</span></label>
                        <input type="number" class="form-control" id="phone_number" name="phone_number"
                            placeholder="Masukkan Nomer Telepon" value='{{ $petugas->phone_number }}'>
                        @if ($errors->has('phone_number'))
                            <span class="text-danger">{{ $errors->first('phone_number') }}</span>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="agency" class="form-label">Asal Instansi<span class="text-danger">*</span></label>
                        <input class='form-control' type="text" name="agency" id="agency"
                            placeholder="Masukkan Alamat Petugas" value='{{ $petugas->agency }}'>
                        @if ($errors->has('agency'))
                            <span class="text-danger">{{ $errors->first('agency') }}</span>
                        @endif
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                    <a href="{{ route('petugas-pemantauan.index') }}" class="btn btn-secondary ms-2">Back</a>
                </form>
            </div>
        </div>
    </div>
@endsection

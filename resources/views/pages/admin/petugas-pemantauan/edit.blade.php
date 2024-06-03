@extends('layouts.app')

@section('content')
    <div class="py-4">
        <div class="row">
            <div class="col-md-12">
                <form method="POST" action="{{ route('petugas-pemantauan.update', $petugas->id) }}" custom-action="true">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="user_id" class="form-label">Data User</label>
                        <select class="form-select" id="user_id" name="user_id" >
                            <option value="" selected disabled>Pilih Data User</option>
                            @foreach ($user as $a)
                                <option value="{{ $a->id }}"{{$petugas->user_id==$a->id?'selected':''}}>{{ $a->email }}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('user_id'))
                            <span class="text-danger">{{ $errors->first('role') }}</span>
                        @enderror
                </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama Petugas</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Masukkan Nama Petugas"
                            value='{{$petugas->name}}' >
                        @if ($errors->has('name'))
                            <span class="text-danger">{{ $errors->first('name') }}</span>
                        @enderror
                </div>
                <div class="mb-3">
                    <label for="gender" class="form-label">Jenis Kelamin</label>
                    <select name="gender" id="gender" class='form-select'>
                        <option value="" selected disabled>Pilih Jenis Kelamin</option>
                        <option value="Laki-laki"{{$petugas->gender=='Laki-laki'?'selected':''}} >Laki-laki</option>
                        <option value="perempuan"{{$petugas->gender=='perempuan'?'selected':''}} >Perempuan</option>
                    </select>
                    @if ($errors->has('gender'))
                        <span class="text-danger">{{ $errors->first('gender') }}</span>
                    @enderror
            </div>
            <div class="mb-3">
                <label for="phone_number" class="form-label">Nomer Telpon</label>
                <input type="number" class="form-control" id="phone_number" name="phone_number"
                    placeholder="Masukkan Nomer Telepon" value='{{$petugas->phone_number}}' >
                @if ($errors->has('phone_number'))
                    <span class="text-danger">{{ $errors->first('phone_number') }}</span>
                @enderror
        </div>
        <div class="mb-3">
            <label for="address" class="form-label">Alamat</label>
            <input class='form-control' type="text" name="address" id="address" placeholder="Masukkan Alamat Petugas" value='{{$petugas->address}}' >
            @if ($errors->has('address'))
                <span class="text-danger">{{ $errors->first('address') }}</span>
            @enderror
    </div>
    <button type="submit" class="btn btn-primary">Save</button>
    <a href="{{ route('petugas-pemantauan.index') }}" class="btn btn-secondary ms-2">Back</a>
</form>
</div>
</div>
</div>
@endsection

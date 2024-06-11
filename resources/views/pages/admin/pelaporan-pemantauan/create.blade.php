@extends('layouts.app')

@section('content')
    <div class="py-4">
        <div class="row">
            <div class="col-md-12">
                <form method="POST" action="{{ route('petugas-pemantauan.store') }}" custom-action="true">
                    @csrf
                    <div class="mb-3">
                        <label for="Qurban-id" class="form-label">Jenis Qurban<span class="text-danger">*</span></label>
                        <select name="Qurban-id" id="Qurban-id" class='form-select'>
                            <option value="" selected disabled>Pilih Jenis Qurban</option>
                            @foreach ($qurban as $item)
                            <option value="{{$item->id}}" {{ old('Qurban-id') == $item->id ? 'selected' : '' }}>{{$item->type_of_animal}}
                            @endforeach
                            
                        </select>
                        @if ($errors->has('Qurban-id'))
                            <span class="text-danger">{{ $errors->first('Qurban-id') }}</span>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="gender" class="form-label">Jenis Kelamin<span class="text-danger">*</span></label>
                        <select name="gender" id="gender" class='form-select'>
                            <option value="" selected disabled>Pilih Jenis Kelamin</option>
                            <option value="Jantan" {{ old('gender') == 'Jantan' ? 'selected' : '' }}>Jantan
                            </option>
                            <option value="Betina" {{ old('gender') == 'Betina' ? 'selected' : '' }}>Betina
                            </option>
                        </select>
                        @if ($errors->has('gender'))
                            <span class="text-danger">{{ $errors->first('gender') }}</span>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="berat-hewan" class="form-label">Berat Hewan</label>
                        <input type="berat-hewan" class="form-control" id="berat-hewan" name="berat-hewan"
                            placeholder="Masukkan berat hewan" value='{{ old('berat-hewan') }}'>
                        @if ($errors->has('berat-hewan'))
                            <span class="text-danger">{{ $errors->first('berat-hewan') }}</span>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="penyakit" class="form-label">Penyakit<span class="text-danger">*</span></label>
                        <input type="number" class="form-control" id="penyakit" name="penyakit"
                            placeholder="Masukkan Nama Penyakit" value='{{ old('penyakit') }}'>
                        @if ($errors->has('penyakit'))
                            <span class="text-danger">{{ $errors->first('penyakit') }}</span>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="harga" class="form-label">Harga<span class="text-danger">*</span></label>
                        <input class='form-control' type="text" name="harga" id="harga"
                            placeholder="Masukkan Harga" value='{{ old('harga') }}'>
                        @if ($errors->has('harga'))
                            <span class="text-danger">{{ $errors->first('harga') }}</span>
                        @endif
                    </div>
                    <input type="hidden" name="role" value="admin-petugas-lapangan">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <a href="{{ route('petugas-pemantauan.index') }}" class="btn btn-secondary ms-2">Back</a>
                </form>
            </div>
        </div>
    </div>
@endsection

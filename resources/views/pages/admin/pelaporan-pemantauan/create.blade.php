@extends('layouts.app')

@section('content')
<div class="py-4">
    <div class="row">
        <div class="col-md-12">
            <form method="POST" action="{{ route('laporan-pemantauan.store') }}" custom-action="true">
                @csrf
                <div class="mb-3">
                    <label for="type_of_qurban_id" class="form-label">Jenis Qurban<span class="text-danger">*</span></label>
                    <select name="type_of_qurban_id" id="type_of_qurban_id" class='form-select'>
                        <option value="" selected disabled>Pilih Jenis Qurban</option>
                        @foreach ($qurban as $item)
                        <option value="{{$item->id}}" {{ old('type_of_qurban_id') == $item->id ? 'selected' : '' }}>
                            {{$item->type_of_animal}}
                            @endforeach

                    </select>
                    @if ($errors->has('type_of_qurban_id'))
                    <span class="text-danger">{{ $errors->first('type_of_qurban_id') }}</span>
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
                    <label for="weight" class="form-label">Berat Hewan</label>
                    <input type="weight" class="form-control" id="weight" name="weight"
                        placeholder="Masukkan berat hewan" value='{{ old('weight') }}'>
                    @if ($errors->has('weight'))
                    <span class="text-danger">{{ $errors->first('weight') }}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="disease" class="form-label">Penyakit<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="disease" name="disease"
                        placeholder="Masukkan Nama Penyakit" value='{{ old('disease') }}'>
                    @if ($errors->has('disease'))
                    <span class="text-danger">{{ $errors->first('disease') }}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="price" class="form-label">Harga<span class="text-danger">*</span></label>
                    <input class='form-control' type="number" name="price" id="price" placeholder="Masukkan Harga"
                        value='{{ old('price') }}'>
                    @if ($errors->has('price'))
                    <span class="text-danger">{{ $errors->first('price') }}</span>
                    @endif
                </div>
                @foreach ($monitoringOfficers as $item)
                <input type="hidden" name="qurban_report_id" value="{{$item->id}}">
                @endforeach
                {{-- <input type="hidden" name="qurban_report_id" value="14"> --}}
                <input type="hidden" name="created_by" value="{{auth()->user()->id}}">
                <input type="hidden" name="update_by" value="{{auth()->user()->id}}">

                <button type="submit" class="btn btn-primary">Save</button>
                <a href="{{ route('laporan-pemantauan.index') }}" class="btn btn-secondary ms-2">Back</a>
            </form>
        </div>
    </div>
</div>
@endsection
@extends('layouts.app')

@section('content')
<div class="py-4">
    <div class="row">
        <div class="col-md-12">
            <form method="POST" action="{{ route('admin.laporan-pemantauan.store_photo') }}" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label class="form-label fw-bold">Dokumentasi</label>
                    <input type="file" name="photo" id="photo" class="form-control shadow-none" accept="image/*" required>
                    @if ($errors->has('photo'))
                        <span class="text-danger">{{ $errors->first('photo') }}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <label class="form-label">Caption</label>
                    <input type="text" name="caption" id="caption" class="form-control shadow-none">
                    @if ($errors->has('caption'))
                        <span class="text-danger">{{ $errors->first('caption') }}</span>
                    @endif
                </div>
                @foreach ($monitoringOfficers as $item)
                    <input type="hidden" name="qurban_report_id" value="{{$item->id}}">
                @endforeach
                {{-- <input type="hidden" name="qurban_report_id" value="14"> --}}
                <input type="hidden" name="created_by" value="{{auth()->user()->id}}">
                <input type="hidden" name="updated_by" value="{{auth()->user()->id}}">

                <button type="submit" class="btn btn-primary">Save</button>
                <a href="{{ route('laporan-pemantauan.index') }}" class="btn btn-secondary ms-2">Back</a>
            </form>
        </div>
    </div>
</div>
@endsection

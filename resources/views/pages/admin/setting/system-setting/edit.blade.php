@extends('layouts.app')

@section('content')
    <div class="py-4">
        <div class="row">
            <div class="col-md-12">
                <form action="{{ route('system.update', $systemSetting->id) }}" method="POST" custom-action="true">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="id" value="{{ $systemSetting->id }}">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label" for="name">Nama <span class="text-danger">*</span></label>
                            <input class="form-control" id="name" name="name" type="text"
                                placeholder="Enter name" value="{{ $systemSetting->name }}">
                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label" for="is_active">Status<span class="text-danger">*</span></label>
                            <select class="form-control" id="is_active" name="is_active">
                                <option value="1" {{ $systemSetting->is_active == '1' ? 'selected' : '' }}>Active</option>
                                <option value="0" {{ $systemSetting->is_active == '0' ? 'selected' : '' }}>Non-Active</option>
                            </select>
                            @error('is_active')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label" for="value">Isi</label>
                            <input class="form-control" id="value" name="value" value="{{ $systemSetting->value }}" placeholder="Enter value">
                            @error('value')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label" for="description">Deksripsi</label>
                            <input class="form-control" id="description" name="description" type="text" value="{{ $systemSetting->description }}" placeholder="Enter description">
                            @error('description')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Save System</button>
                    <a href="{{ route('system.index') }}" class="btn btn-secondary ms-2">Back</a>
                </form>
            </div>
        </div>
    </div>

    @push('css')
        <link rel="stylesheet" href="{{ asset('assets/plugins/custom/select2/select2.min.css') }}">
    @endpush

    @push('scripts')
        <script src="{{ asset('assets/plugins/custom/jquery/jquery-3.7.1.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/custom/select2/select2.min.js') }}"></script>
        <script>
            function createSlug(name) {
                return name
                    .toLowerCase()
                    .replace(/[^a-zA-Z0-9]+/g, '-')
                    .replace(/^-+|-+$/g, '')
                    .trim();
            }

            document.getElementById('name').addEventListener('input', function() {
                var nameInput = this.value;
                var slugInput = document.getElementById('slug');

                var slug = createSlug(nameInput);
                slugInput.value = slug;
            });

            document.addEventListener("DOMContentLoaded", function() {
                function formatIcon(icon) {
                    if (!icon.id) {
                        return icon.text;
                    }
                    var $icon = $('<span><i class="' + icon.element.value.toLowerCase() + '"></i> ' + icon.text +
                        '</span>');
                    return $icon;
                };

                $('#icon').select2({
                    templateResult: formatIcon
                });
            });
        </script>
    @endpush
@endsection
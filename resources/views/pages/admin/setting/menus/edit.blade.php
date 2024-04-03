@extends('layouts.app')

@section('content')
    <div class="py-4">
        <div class="row">
            <div class="col-md-12">
                <form action="{{ route('admin.setting.menus.update', ['menu' => $data->id]) }}" method="POST">
                    @method('PUT')
                    @csrf

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label" for="name">Name <span class="text-danger">*</span>
                            </label>
                            <input class="form-control" id="name" name="name" type="text"
                                placeholder="Enter name" value="{{ old('name', $data->name) }}">
                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label" for="slug">Slug <span class="text-danger">*</span>
                            </label>
                            <input readonly class="form-control" id="slug" name="slug" type="text"
                                placeholder="Enter slug" value="{{ old('slug', $data->slug) }}">
                            @error('slug')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label" for="module">Module</label>
                            <input class="form-control" id="module" name="module" type="text"
                                placeholder="Enter module" value="{{ old('module', $data->module) }}">
                            @error('module')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label" for="url">Url</label>
                            <input class="form-control" id="url" name="url" type="text" placeholder="Enter url"
                                value="{{ old('url', $data->url) }}">
                            @error('url')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label" for="icon">Icon <span class="text-danger">*</span>
                            </label>
                            <select class="form-control" id="icon" name="icon">
                                <option value="">Select Icon</option>
                                @foreach ($icons as $icon)
                                    <option value="{{ $icon->class }}"
                                        {{ old('icon', $data->icon) == $icon->class ? 'selected' : '' }}>
                                        {{ $icon->class }}
                                @endforeach
                            </select>
                            @error('icon')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label" for="parent_id">Parent</label>
                            <select class="form-control" id="parent_id" name="parent_id">
                                <option value="">No Parent</option>
                                @foreach ($parents as $menu)
                                    <option value="{{ $menu->id }}"
                                        {{ old('parent_id', $data->parent_id) == $menu->id ? 'selected' : '' }}>
                                        {{ $menu->name }}</option>
                                @endforeach
                            </select>
                            @error('parent_id')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label" for="order">Order <span class="text-danger">*</span>
                            </label>
                            <input class="form-control" id="order" name="order" type="number"
                                placeholder="Enter order" value="{{ old('order', $data->order) }}" min="0">
                            @error('order')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label" for="is_active">Status <span class="text-danger">*</span>
                            </label>
                            <select class="form-control" id="is_active" name="is_active">
                                <option value="">Select State Active</option>
                                <option value="1" {{ old('is_active', $data->is_active) === '1' ? 'selected' : '' }}>
                                    Active</option>
                                <option value="0" {{ old('is_active', $data->is_active) === '0' ? 'selected' : '' }}>
                                    Non-Active</option>
                            </select>
                            @error('is_active')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row">

                        <div class="col-md-6 mb-3">
                            <label class="form-label" for="location">Location <span class="text-danger">*</span>
                            </label>
                            <select class="form-control" id="location" name="location">
                                <option value="">Select Location</option>
                                <option value="sidebar"
                                    {{ old('location', $data->location) === 'sidebar' ? 'selected' : '' }}>
                                    Sidebar</option>
                                <option value="topbar"
                                    {{ old('location', $data->location) === 'topbar' ? 'selected' : '' }}>
                                    Topbar</option>
                            </select>
                            @error('location')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Update Menu</button>
                    <a href="{{ route('admin.setting.menus.index') }}" class="btn btn-secondary ms-2">Back</a>
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

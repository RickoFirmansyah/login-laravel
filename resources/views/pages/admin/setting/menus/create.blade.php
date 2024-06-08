@extends('layouts.app')

@section('content')
    <div class="py-4">
        <div class="row">
            <div class="col-md-12">
                <form action="{{ route('menus.store') }}" method="POST" custom-action="true">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label" for="name">Name <span class="text-danger">*</span>
                            </label>
                            <input class="form-control" id="name" name="name" type="text"
                                placeholder="Enter name" >
                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label" for="slug">Slug <span class="text-danger">*</span>
                            </label>
                            <input readonly class="form-control" id="slug" name="slug" type="text"
                                placeholder="Enter slug">
                            @error('slug')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label" for="module">Module</label>
                            <input class="form-control" id="module" name="module" type="text"
                                placeholder="Enter module">
                            @error('module')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label" for="type">Type<span class="text-danger">*</span>
                            </label>
                            <select class="form-control" id="type" name="type">
                                <option value="">Select Type</option>
                                <option value="menu">Menu</option>
                                <option value="group">Group</option>
                                <option value="divider">Divider</option>
                            </select>
                            @error('type')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-md-6 mb-3">
                            <label class="form-label" for="url">Url</label>
                            <input class="form-control" id="url" name="url" type="text" placeholder="Enter url">
                            @error('url')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label" for="icon">Icon <span class="text-danger">*</span></label>
                            <x-atoms.select2 name="icon" id="icon_field" source="{{ route('icons.ref') }}" placeholder="Select Icon" custom></x-atoms.select2>
                        </div>
                        

                        <div class="col-md-6 mb-3">
                            <label class="form-label" for="parent_id">Parent</label>
                            <x-atoms.select2 id="parent_id_field" name="parent_id" :lists="c_option($menus)" :value="$menu->parent_id">
                            </x-atoms.select2>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label" for="target">Target<span class="text-danger">*</span>
                            </label>
                            <select class="form-control" id="target" name="target">
                                <option value="">Select Target</option>
                                <option value="_self">Self</option>
                                <option value="_blank">Blank</option>
                            </select>
                            @error('target')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label" for="order">Order <span class="text-danger">*</span>
                            </label>
                            <input class="form-control" id="order" name="order" type="number"
                                placeholder="Enter order" min="0">
                            @error('order')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label" for="is_active">Status <span class="text-danger">*</span>
                            </label>
                            <select class="form-control" id="is_active" name="is_active">
                                <option value="">Select State Active</option>
                                <option value="1">Active</option>
                                <option value="0">Non-Active</option>
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
                                <option value="sidebar">Sidebar</option>
                                <option value="topbar">Topbar</option>
                            </select>
                            @error('location')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Tambah Menu</button>
                    <a href="{{ route('menus.index') }}" class="btn btn-secondary ms-2">Kembali</a>
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
       <script>
        $(function() {
            $('#name_field').on('input', function() {
                const slug = $(this).val()
                    .toLowerCase()
                    .replace(/[^a-zA-Z0-9]+/g, '-')
                    .replace(/^-+|-+$/g, '')
                    .trim();
                $("#slug_field").val(slug);
            });
    
            function formatIcon(state) {
                if (!state.id) {
                    return state.text;
                }
                const icon = $(`<span><i class="${state.id} fs-5 me-3"></i> ${state.text}</span>`);
                return icon;
            }
    
            $("#icon_field").select2({
                placeholder: "Select Icon",
                allowClear: true,
                templateResult: formatIcon,
                templateSelection: formatIcon,
                ajax: {
                    url: "{{ route('icons.ref') }}",
                    dataType: 'json',
                    delay: 250,
                    processResults: function(data) {
                        return {
                            results: data.results
                        };
                    },
                }
            });
        });
    </script>
    @endpush
@endsection
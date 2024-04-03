@extends('layouts.app')

@section('content')
    <div class="mt-2">
        <form action="{{ route('menus.update', $menu->id) }}" method="POST">
            @csrf
            @method("PUT")
            <div class="row">
                <div class="col-md-6 mb-3">
                    <x-atoms.form-label for="name_field" required>Name</x-atoms.form-label>
                    <x-atoms.input name="name" id="name_field" value="{{ $menu->name }}" placeholder="Enter Name" />
                </div>

                <div class="col-md-6 mb-3">
                    <x-atoms.form-label for="slug_field" required>Slug</x-atoms.form-label>
                    <x-atoms.input name="slug" id="slug_field" value="{{ $menu->slug }}" readonly />
                </div>
            </div>

            <div class="mb-3">
                <x-atoms.form-label for="module_field" required>Module</x-atoms.form-label>
                <x-atoms.input name="module" id="module_field" value="{{ $menu->module }}" placeholder="Enter Module" />
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <x-atoms.form-label for="type_field" required>Type</x-atoms.form-label>
                    <x-atoms.select placeholder="Select Type" id="type_field" name="type" value="{{ $menu->type }}"
                        :lists="[
                            'menu' => 'Menu',
                            'group' => 'Group',
                            'divider' => 'Divider',
                        ]"></x-atoms.select>
                </div>

                <div class="col-md-6 mb-3">
                    <x-atoms.form-label for="url_field" required>Url</x-atoms.form-label>
                    <x-atoms.input name="url" id="url_field" value="{{ $menu->url }}" placeholder="Enter URL" />
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <x-atoms.form-label for="icon_field" required>Icon</x-atoms.form-label>
                    <x-atoms.select2 name="icon" id="icon_field" source="{{ route('icons.ref') }}" :value="[
                        'v' => $menu->icon,
                        't' => $menu->icon,
                    ]"
                        placeholder="Select Icon" custom>
                    </x-atoms.select2>
                </div>
                <div class="col-md-6 mb-3">
                    <x-atoms.form-label for="parent_id_field" required>Parent</x-atoms.form-label>
                    <x-atoms.select2 id="parent_id_field" name="parent_id" :lists="c_option($menus)" :value="$menu->parent_id">
                    </x-atoms.select2>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <x-atoms.form-label for="target_field" required>Target</x-atoms.form-label>
                    <x-atoms.select placeholder="Select Target" id="target_field" name="target" :value="$menu->target"
                        :lists="[
                            '_self' => 'Self',
                            '_blank' => 'Blank',
                        ]"></x-atoms.select>
                </div>
                <div class="col-md-6 mb-3">
                    <x-atoms.form-label for="order_field" required>Order</x-atoms.form-label>
                    <x-atoms.input name="order" id="order_field" placeholder="Enter Order" type="number" min="0"
                        :value="$menu->order" />
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <x-atoms.form-label for="location_field" required>Location</x-atoms.form-label>
                    <x-atoms.radio-group name="location" :value="$menu->location" :lists="[
                        'sidebar' => 'Sidebar',
                        'topbar' => 'Topbar',
                    ]"></x-atoms.radio-group>
                </div>
                <div class="col-md-6 mb-3">
                    <x-atoms.form-label for="location_field" required>Status</x-atoms.form-label>
                    <x-atoms.radio-group name="is_active" :value="$menu->is_active" :lists="[
                        '1' => 'Active',
                        '0' => 'Non-Active',
                    ]"></x-atoms.radio-group>
                </div>
            </div>

            <div class="d-flex justify-content-end mt-3 flex-reverse">
                <a href="{{ route('menus.index') }}" class="btn btn-light me-3" cancel-btn>Back</a>
                <button type="submit" class="btn btn-primary" >Save Menu</button>
            </div>
        </form>
    </div>

    @push('scripts')
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
                                results: data.data
                            };
                        },
                    }
                });
            })
        </script>
    @endpush
@endsection

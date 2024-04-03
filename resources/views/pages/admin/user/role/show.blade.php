@extends("layouts.app")

@section("content")
    <div class="d-flex flex-column flex-column-fluid">

        <div id="kt_app_content" class="app-content flex-column-fluid">
            <div id="kt_app_content_container" class="app-container container-fluid">

                @if (session("success"))
                    <div class="alert alert-dismissible bg-light-success d-flex flex-column flex-sm-row p-5 mb-10">
                        <i class="ki-duotone ki-notification-bing fs-2hx text-success me-4 mb-5 mb-sm-0"><span
                                class="path1"></span><span class="path2"></span><span class="path3"></span></i>
                        <div class="d-flex flex-column pe-0 pe-sm-10">
                            <h4 class="fw-semibold">Success</h4>
                            <span>{{ session("success") }}</span>
                        </div>
                        <button type="button"
                            class="position-absolute position-sm-relative m-2 m-sm-0 top-0 end-0 btn btn-icon ms-sm-auto"
                            data-bs-dismiss="alert">
                            <i class="ki-duotone ki-cross fs-1 text-success"><span class="path1"></span><span
                                    class="path2"></span></i>
                        </button>
                    </div>
                @endif

                <div class="row g-5 gx-xl-10 mb-5 mb-xl-10">
                    <form action="{{ route("role.permissions", $role->id) }}" method="post">
                        @csrf
                        @method("PUT")
                        <div class="col-xxl-12">

                            @php
                                $count_menus = count($menus);
                            @endphp
                            @for ($i = 0; $i < count($menus); $i += 3)
                                <div class="row g-5 g-xl-8">
                                    @if ($count_menus)
                                        <div class="col-xl-4">
                                            
                                            <div class="card bg-danger hoverable card-xl-stretch mb-xl-8">
                                                
                                                <div class="card-body">
                                                    <i class="{{ $menus[$i]->icon }} text-white"></i>
                                                    <div class="text-white fw-bold fs-2 mb-2 mt-5">{{ $menus[$i]->name }}
                                                    </div>
                                                    <div class="fw-semibold text-white">{{ $menus[$i]->url }}</div>
                                                    <div class="form-check form-switch pt-4 pb-10">
                                                        <input class="form-check-input switch-checkbox" type="checkbox"
                                                            role="switch" id="switch-{{ $menus[$i]->id }}"
                                                            data-id="{{ $menus[$i]->id }}" name="{{ $menus[$i]->module }}"
                                                            @if (in_array($menus[$i]->module, $permissions)) checked @endif>
                                                    </div>
                                                    @php
                                                        $access = \App\Models\Setting\Access::where(
                                                            "menus_id",
                                                            "=",
                                                            $menus[$i]->id,
                                                        )->get();
                                                    @endphp
                                                    @foreach ($access as $item)
                                                        <div class="pt-3 form-check">
                                                            <input type="checkbox" class="form-check-input related-checkbox"
                                                                name="{{ $item->module }}"
                                                                data-parent="{{ $menus[$i]->id }}"
                                                                id="checkbox-{{ $item->module }}"
                                                                @if (in_array($item->module, $permissions)) checked @endif>
                                                            <label class="form-check-label" style="color: white"
                                                                for="{{ $item->module }}">{{ $item->name }}</label>
                                                        </div>
                                                    @endforeach
                                                </div>

                                                
                                            </div>
                                            
                                        </div>
                                    @endif
                                    @if ($count_menus - 1 > 0)
                                        <div class="col-xl-4">
                                            <a href="#"
                                                class="card bg-primary hoverable card-xl-stretch mb-xl-8">
                                                
                                                <div class="card-body">
                                                    <i class="{{ $menus[$i + 1]->icon }} text-white">

                                                    </i>
                                                    <div class="text-white fw-bold fs-2 mb-2 mt-5">
                                                        {{ $menus[$i + 1]->name }}
                                                    </div>
                                                    <div class="fw-semibold text-white">{{ $menus[$i + 1]->url }}</div>
                                                    <div class="form-check form-switch pt-4 pb-10">
                                                        <input class="form-check-input switch-checkbox" type="checkbox"
                                                            role="switch" id="switch-{{ $menus[$i + 1]->id }}"
                                                            data-id="{{ $menus[$i + 1]->id }}"
                                                            name="{{ $menus[$i + 1]->module }}"
                                                            value="{{ $menus[$i + 1]->module }}"
                                                            @if (in_array($menus[$i + 1]->module, $permissions)) checked @endif>
                                                    </div>
                                                    @php
                                                        $access = \App\Models\Setting\Access::where(
                                                            "menus_id",
                                                            "=",
                                                            $menus[$i + 1]->id,
                                                        )->get();
                                                    @endphp
                                                    @foreach ($access as $item)
                                                        <div class="pt-3 form-check">
                                                            <input type="checkbox" class="form-check-input related-checkbox"
                                                                type="checkbox" name="{{ $item->module }}"
                                                                id="checkbox-{{ $item->module }}"
                                                                data-parent="{{ $menus[$i + 1]->id }}"
                                                                @if (in_array($item->module, $permissions)) checked @endif>
                                                            <label class="form-check-label" style="color: white"
                                                                for="{{ $item->module }}">{{ $item->name }}</label>
                                                        </div>
                                                    @endforeach
                                                </div>
                                                
                                            </a>
                                            
                                        </div>
                                    @endif
                                    @if ($count_menus - 2 > 0)
                                        <div class="col-xl-4">
                                            
                                            <div class="card bg-success hoverable card-xl-stretch mb-5 mb-xl-8">
                                                
                                                <div class="card-body">
                                                    <i class="{{ $menus[$i + 2]->icon }} text-white">

                                                    </i>
                                                    <div class="text-white fw-bold fs-2 mb-2 mt-5">
                                                        {{ $menus[$i + 2]->name }}
                                                    </div>
                                                    <div class="fw-semibold text-white">{{ $menus[$i + 2]->url }}</div>
                                                    <div class="form-check form-switch pt-4 pb-10">
                                                        <input class="form-check-input switch-checkbox" type="checkbox"
                                                            role="switch" id="switch-{{ $menus[$i + 2]->id }}"
                                                            data-id="{{ $menus[$i + 2]->id }}"
                                                            value="{{ $menus[$i + 2]->module }}"
                                                            name="{{ $menus[$i + 2]->module }}"
                                                            @if (in_array($menus[$i + 2]->module, $permissions)) checked @endif>
                                                    </div>
                                                    @php
                                                        $access = \App\Models\Setting\Access::where(
                                                            "menus_id",
                                                            "=",
                                                            $menus[$i + 2]->id,
                                                        )->get();
                                                    @endphp
                                                    @foreach ($access as $item)
                                                        <div class="pt-3 form-check">
                                                            <input type="checkbox" class="form-check-input related-checkbox"
                                                                type="checkbox" name="{{ $item->module }}"
                                                                id="checkbox-{{ $item->module }}"
                                                                data-parent="{{ $menus[$i + 2]->id }}"
                                                                @if (in_array($item->module, $permissions)) checked @endif>
                                                            <label class="form-check-label" style="color: white"
                                                                for="{{ $item->module }}">{{ $item->name }}</label>
                                                        </div>
                                                    @endforeach
                                                </div>
                                                
                                            </div>
                                            
                                        </div>
                                    @endif
                                </div>
                                @php
                                    $count_menus -= 3;
                                @endphp
                            @endfor
                            <button class="btn btn-primary" type="submit">Save</button>
                            <a href="{{ route("role.index") }}" class="btn btn-default">Kembali</a>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @push("css")
        <style>
            .form-check-input:checked {
                background-color: #FAC213;

                border-color: #FAC213;

            }
        </style>
    @endpush

    @push("scripts")
        <script>
            $(document).ready(function() {
                $('.switch-checkbox').change(function() {
                    var id = $(this).data('id');
                    if ($(this).is(':checked')) {
                        $('.related-checkbox[data-parent="' + id + '"]').prop('checked', true);
                    } else {
                        $('.related-checkbox[data-parent="' + id + '"]').prop('checked', false);
                    }
                });
            });
        </script>
    @endpush

@endsection

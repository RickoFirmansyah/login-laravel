{{-- available params:
    1. source
    2. parent
    3. multiple (use custom form handling instead)
  --}}

@props([
    'placeholder' => 'Select And Option',
    'lists' => [],
    'allowClear' => true,
    'parent' => null,
    'source' => '',
    'value' => [
        'v' => '',
        't' => '',
    ],
])



@if ($source != '')
    <select data-plugin="select-2" data-source="{{ $source }}" data-placeholder="{{ $placeholder }}"
        data-allow-clear="{{ $allowClear }}" data-parent="{{ $parent }}"
        {{ $attributes->merge(['class' => 'form-select ']) }}>
        <option value="" selected disabled></option>
        {{ $slot }}
        @if ($value['v'])
            <option selected value="{{ $value['v'] }}">{{ $value['t'] }}</option>
        @endif
    </select>
@else
    <select data-plugin="select-2" data-placeholder="{{ $placeholder }}" data-allow-clear="{{ $allowClear }}"
        data-dropwdown-parent="{{ $parent }}" {{ $attributes->merge(['class' => 'form-select ']) }}>
        <option value="" selected disabled></option>
        {{ $slot }}
        @if (count($lists) > 0)
            @foreach ($lists as $key => $label)
                <option value="{{ $key }}">{{ $label }}</option>
            @endforeach
        @endif
    </select>
@endif

@once

    @push('styles')
        <link href="{{ asset('assets/plugins/custom/select2/select2.bundle.css') }}" rel="stylesheet" type="text/css" />
    @endpush
    @push('vendor')
        <script src="{{ asset('assets/plugins/custom/select2/select2.bundle.js') }}"></script>
    @endpush
@endonce

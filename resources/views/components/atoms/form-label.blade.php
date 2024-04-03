<label {{ $attributes->merge(['class' => 'form-label mb-3']) }}>
    {{ $slot }}
    @if ($attributes->has('required'))
        <span class="text-danger">*</span>
    @endif
</label>

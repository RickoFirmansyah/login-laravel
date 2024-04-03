@props([
    'id',
    'name',
    'placeholder' => 'Enter text here...',
    'tabsize' => 4,
    'height' => '200px',
])

<textarea name="{{ $name }}" id="{{ $id }}"></textarea>

@push('scripts')
<script>
  $(document).ready(function() {
      $('#{{ $id }}').summernote({
        placeholder: '{{ $placeholder }}',
        tabsize: {{ $tabsize }},
        height: '{{ $height }}',
      });
  });
</script>
@endpush
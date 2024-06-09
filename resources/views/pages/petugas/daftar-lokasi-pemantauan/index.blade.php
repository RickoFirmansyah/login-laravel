@extends('layouts.app')

@section('content')

<div class="table-responsive">
    <h5><b>Laporan Jenis Kurban</b></h5>
    {{ $dataTable->table() }}
</div>

@endsection


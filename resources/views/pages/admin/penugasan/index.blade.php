@extends('layouts.app')

@section('content')
<div class="d-flex flex-column flex-column-fluid">
    <div class="app-toolbar py3 py-lg-6">
        <div class="app-container container-xxl d-flex flex-stack">
            <!--end::Title-->
        </div>
    </div>

    <div class="card-body py-2">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <div class="d-flex align-items-center position-relative my-1">
                <span class="ki-outline ki-magnifier fs-3 position-absolute ms-5"></span>
                <input type="text" data-kt-user-table-filter="search" data-table-id="penugasan-table" class="form-control form-control-solid w-250px ps-13" placeholder="Cari Petugas" id="mySearchInput" />
            </div>
            <div class="">
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    <i class="fas fa-file fa-sm text-white" aria-hidden="true"></i>
                    <span class="ms-2">
                        Import Penugasan
                    </span>
                </button>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered" id="penugasan-table">
                <thead>
                    <tr>
                        <th>Aksi</th>
                        <th>No</th>
                        <th>Nama Petugas</th>
                        <th>Jenis Kelamin</th>
                        <th>Nomor Telepon</th>
                        <th>Asal Instansi</th>
                        <th>Jumlah Penugasan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($monitoringOfficers as $officer)
                    <tr>
                        <td>
                            <a href="{{ route('admin.penugasan.add', $officer->id) }}" class="btn btn-primary btn-sm"><i class="fas fa-plus fa-sm text-white"></i></a>
                        </td>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $officer->name }}</td>
                        <td>{{ $officer->gender }}</td>
                        <td>{{ $officer->phone_number }}</td>
                        <td>{{ $officer->agency }}</td>
                        <td>{{ $officer->assignments_count }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const searchInput = document.getElementById('mySearchInput');
        const table = document.getElementById('penugasan-table');
        const tableRows = table.getElementsByTagName('tr');

        searchInput.addEventListener('keyup', function() {
            const filter = searchInput.value.toLowerCase();
            for (let i = 1; i < tableRows.length; i++) { // Start from 1 to skip header row
                const row = tableRows[i];
                const cells = row.getElementsByTagName('td');
                let textContent = '';
                for (let j = 0; j < cells.length; j++) {
                    textContent += cells[j].textContent.toLowerCase() + ' ';
                }
                row.style.display = textContent.indexOf(filter) > -1 ? '' : 'none';
            }
        });
    });
</script>
@endsection
@extends('layouts.app')

@section('content')
    <div class="d-flex flex-column flex-column-fluid">
        <div class="app-toolbar py3 py-lg-6">
            <div class="app-container container-xxl d-flex flex-stack">    
                <!--end::Title-->
                </div>
            </div>
        </div>

        <div class="card-body py-2">
            <div class="d-flex align-items-center justify-content-between mb-4">
                <div class="d-flex align-items-center position-relative my-1">
                    <span class="ki-outline ki-magnifier fs-3 position-absolute ms-5"></span>
                    <input type="text" data-kt-user-table-filter="search" data-table-id="penugasan-table"
                        class="form-control form-control-solid w-250px ps-13" placeholder="Cari Petugas"
                        id="mySearchInput" />
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
                            <th>Alamat</th>
                            <th>Jumlah Penugasan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($monitoringOfficers as $officer)
                        <tr>
                            <td>
                                <a href="{{ route('admin.penugasan.add', $officer->id) }}" class="btn btn-primary btn-sm"><i class="fa-solid fa-user-plus"></i></a>
                            </td>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $officer->name }}</td>
                            <td>{{ $officer->gender }}</td>
                            <td>{{ $officer->phone_number }}</td>
                            <td>{{ $officer->address }}</td>
                            <td>{{ $officer->assignments_count }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

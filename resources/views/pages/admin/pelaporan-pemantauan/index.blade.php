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
                            <th>Tempat Pemotongan</th>
                            <th>Jumlah</th>
                           
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($monitoringOfficers as $officer)
                        <tr>
                            <td>
                                <a href="{{ route("laporan-pemantauan.create") }}" class="btn btn-success">
                                    <i class="fas fa-plus fa-sm text-white-50"></i>
                                </a>
                            </td>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $officer->slaughteringPlace->cutting_place }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

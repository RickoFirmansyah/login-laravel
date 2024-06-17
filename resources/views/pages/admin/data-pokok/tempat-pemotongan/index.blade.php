@extends('layouts.app')

@section('content')
    <div class="card-body py-4">
        <div class="app-container">
            @if (session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif

            @if (session()->has('error'))
                <div class="alert alert-danger">
                    {{ session()->get('error') }}
                </div>
            @endif
            <div class="py-4">
                <div class="d-flex align-items-center justify-content-between position-relative mb-3">
                    <div class="search-box">
                        <label class="position-absolute" for="searchBox">
                            <i class="fal fa-search fs-3"></i>
                        </label>
                        <input type="text" data-table-id="slaughteringplace-table" id="searchBox" data-action="search"
                            class="form-control form-control-solid w-250px ps-13" placeholder="Cari Tempat Pemotongan" />
                    </div>
                    <div>
                        <a href="{{ route('admin.data-pokok.tempat-pemotongan.create') }}" class="btn btn-primary py-2">
                            <i class="fas fa-plus fa-sm text-white-50"></i>
                            <span class="ms-2">
                                Tambah Tempat Pemotongan
                            </span>
                        </a>
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            <i class="fas fa-file fa-sm text-white-50" aria-hidden="true"></i>
                            <span class="ms-2">
                                Import
                            </span>
                        </button>
                    </div>
                </div>
                <div class="table-responsive">
                    {{ $dataTable->table() }}
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-lg">
          <div class="modal-content rounded-1">
            <div class="modal-header border-bottom">
              {{-- <input type="search" class="form-control fs-3" placeholder="Search here" id="search" /> --}}
              {{-- <span data-bs-dismiss="modal" class="lh-1 cursor-pointer">
                <i class="ti ti-x fs-5 ms-3"></i>
              </span> --}}
              <span data-bs-dismiss="modal" class="lh-1 cursor-pointer">
                {{-- <i class="ti ti-x fs-5 ms-3"></i> --}}
                Import Tepat Pemotongan
              </span>
            </div>
            <div class="modal-body message-body" data-simplebar="">
                <form action="{{route('admin.data-pokok.tempat-pemotongan.import')}}" method="post">
                    @csrf
                    <input type="file" class="form-control fs-3" name="file" id="file" />

                    <button type="submit" class="btn btn-primary mt-2">Submit</button>
                </form>

            </div>
            <div class="modal-footer border-top"></div>
          </div>
        </div>
      </div>

    @push('scripts')
        {{ $dataTable->scripts() }}
    @endpush
@endsection

@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <!-- Menggunakan flexbox untuk menyelaraskan item ke kiri dan kanan -->
                <div class="d-flex justify-content-between align-items-center">
                    <div class="d-flex justify-content-between align-items-center">
                        <img src="{{ asset('assets/images/profile/user-4.jpg') }}" alt="Profile Image" class="rounded-circle" width="100" height="100">
                        <div class="ms-4">
                            <h2>Nama : {{ $officer->name }}</h2>
                            <p>No.Telp : {{ $officer->phone_number }}</p>
                            <p>Alamat : {{ $officer->address }}</p>
                        </div>
                    </div>
                    <!-- Tombol diletakkan di sisi kanan -->
                    <a href="{{ route('admin.penugasan.index') }}" class="btn btn-info">Lihat Penugasan</a>
                </div>
                <div class="card mt-4">
                    <div class="card-body">
                        @if (session()->has('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session()->get('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        @if (session()->has('error'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{ session()->get('error') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h4>Daftar Tempat Penugasan</h4>
                            <button class="btn btn-primary" data-toggle="modal" data-target="#slaughteringPlaceModal">Tambah Penugasan</button>
                        </div>
                        <form method="POST" action="{{ route('admin.penugasan.store') }}">
                            @csrf
                            <input type="hidden" name="monitoring_officer_id" value="{{ $officer->id }}">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Nama Tempat Pemotongan</th>
                                            <th>Kecamatan</th>
                                            <th>Desa / Kelurahan</th>
                                            <th>Alamat</th>
                                            <th>Tanggal Penugasan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody id="assignmentTableBody">
                                        <!-- Data akan ditambahkan di sini oleh JavaScript -->
                                    </tbody>
                                </table>
                            </div>
                            <button type="submit" class="btn btn-success" id="saveAssignmentButton">Simpan Penugasan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="slaughteringPlaceModal" tabindex="-1" role="dialog" aria-labelledby="slaughteringPlaceModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="slaughteringPlaceModalLabel">Daftar Nama Tempat Pemotongan</h5>
                </div>
                <div class="modal-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Nama Tempat Pemotongan</th>
                                    <th>Kecamatan</th>
                                    <th>Desa / Kelurahan</th>
                                    <th>Pilih</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($slaughteringPlaces as $place)
                            <tr>
                                <td>{{ $place->cutting_place }}</td>
                                <td>{{ $place->kecamatan->nama ?? 'N/A' }}</td>
                                <td>{{ $place->kelurahan->nama ?? 'N/A' }}</td>
                                <td>
                                    <button class="btn btn-primary btn-sm" onclick="addPlaceToAssignment({{ $place->id }}, '{{ $place->cutting_place }}', '{{ $place->kecamatan->nama }}', '{{ $place->kelurahan->nama }}', '{{ $place->address }}')">Pilih</button>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        $(document).ready(function() {
            // Event delegation untuk menghapus baris dan mengembalikan ke pop-up
            $('#assignmentTableBody').on('click', '.btn-danger', function() {
                const row = $(this).closest('tr');
                const id = row.find('input[type="hidden"]').val(); // ID disimpan dalam input hidden

                // Menghapus baris dari tabel penugasan
                row.remove();
                updateRowNumbers();
            });

            // Fungsi untuk menambahkan tempat ke penugasan dan menghapus dari modal
            window.addPlaceToAssignment = function(id, cuttingPlace, kecamatan, kelurahan, address) {
                const tableBody = document.getElementById('assignmentTableBody');
                const row = document.createElement('tr');

                row.innerHTML = `
                    <input type="hidden" name="assignments[${id}][place_id]" value="${id}">
                    <td>${cuttingPlace}</td>
                    <td>${kecamatan}</td>
                    <td>${kelurahan}</td>
                    <td>${address}</td>
                    <td><input type="date" name="assignments[${id}][date]" class="form-control"></td>
                    <td>
                        <button class="btn btn-danger btn-sm">Hapus</button>
                    </td>
                `;

                tableBody.appendChild(row);
                updateRowNumbers();
                $(`button[onclick="addPlaceToAssignment(${id}, '${cuttingPlace}', '${kecamatan}', '${kelurahan}', '${address}')"]`).closest('tr').remove();
            };

            // Fungsi untuk memperbarui nomor baris
            function updateRowNumbers() {
                const rows = document.querySelectorAll('#assignmentTableBody tr');
                rows.forEach((row, index) => {
                    row.children[0].textContent = index + 1;
                });
            }
        });
    </script>
@endsection

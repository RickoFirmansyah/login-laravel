@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h2 class="my-4">Tambah Penugasan</h2>
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-4">
                            <img src="path_to_profile_image" alt="Profile Image" class="rounded-circle" width="50" height="50">
                            <div class="ml-3">
                                <h4>{{ $officer->name }}</h4>
                                <p>{{ $officer->address }}</p>
                                <p>{{ $officer->phone_number }}</p>
                            </div>
                        </div>
                        <div class="mt-4">
                            <h4>Daftar Tempat Penugasan</h4>
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Tempat Pemotongan</th>
                                            <th>Kecamatan</th>
                                            <th>Desa / Kelurahan</th>
                                            <th>Alamat</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($slaughteringPlaces as $place)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $place->cutting_place }}</td>
                                            <td>{{ $place->kecamatan_id }}</td>
                                            <td>{{ $place->kelurahan_id }}</td>
                                            <td>{{ $place->address }}</td>
                                            <td>
                                                <form action="{{ url('delete-penugasan/' . $place->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i> Hapus</button>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

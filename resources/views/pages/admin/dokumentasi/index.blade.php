@extends('layouts.app')

@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <style>
        .sidebar {
            height: 100vh;
            background: #f8f9fa;
            padding: 15px;
        }
        .content {
            padding: 15px;
        }
        .image-placeholder {
            width: 100%;
            padding-top: 75%;
            background: #e9ecef;
            border: 1px solid #dee2e6;
            margin-bottom: 15px;
        }
        .top-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px;
            background: #f8f9fa;
            border-bottom: 1px solid #dee2e6;
        }
    </style>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="top-bar">
                <h4>DOKUMENTASI</h4>
                <div>
                    <button class="btn btn-outline-primary">Tahun - 2024</button>
                    <button class="btn btn-primary">Unduh Laporan</button>
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addItem">Tambah Foto</button>
                </div>
            </div>
            <div class="col-2 sidebar">
                <h5>KECAMATAN BAKUNG</h5>
            </div>
            <div class="col-10 content">
                <div class="row">
                    @foreach ($items as $item)
                        <div class="col-4">
                            <div class="card border-0 mb-3">
                                <img src="{{ url('storage/' . $item->photo) }}" alt="" class="card-img-top">

                                <div class="card-body">
                                    <p class="mb-0 text-secondary">{{ $item->caption }}</p>
                                </div>
                            </div>
                    @endforeach                    
                </div>
            </div>

            <div class="modal" id="addItem" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Tambah Foto</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('dokumentasi.store') }}" method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="mb-3">
                                <label for="photo">Tambah Foto</label>
                                <input type="file" accept="photo/*" name="photo" id="photo" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="caption">Caption</label>
                                <textarea name="caption" id="caption" cols="30" rows="5" class="form-control"></textarea>
                            </div>

                            <button class="btn btn-primary" type="submit">Simpan</button>

                        </form>
                    </div>
                  </div>
                </div>
              </div>

        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

@endsection


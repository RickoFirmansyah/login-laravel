@extends('layouts.app')

@section('content')
<h3><b>Laporan statistik</b></h3>
    <div class="card-body py-4">
        <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center position-relative my-1 ms-auto">
                <div class="d-flex align-items-center position-relative my-1">
                    <input type="date" id="tanggal" name="tanggal" class="form-control form-control-solid" style="width: 150px; margin-right: 10px;">
                </div>
            </div>
            
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add-kabupatenkota_modal"
                data-action="edit" data-url="">
                <i class="fal fa-download fs-3"></i>
                <span class="ms-2">
                    Unduh Laporan
                </span>
            </button>
        </div>

        <div class="row">    
       
            <div class="col-md-6">
                <div class="card bg-primary">
                    <div class="card-body text-center">
                        <div class="row">
                            <div class="col-6">
                                <h5 class="card-title text-white">Hewan Kurban Sapi</h5>
                                <!-- Icon hewan -->
                                <img src="icon-hewan.png" class="img-fluid" alt="Icon Hewan">
                            </div>
                            <div class="col-6">
                                <h1 class="card-title text-white">TOTAL</h1>
                                <h1 class="card-title text-white font-weight-bold">20</h1>
                            </div>
                        </div>
                        <hr class="text-white">
                        <div class="row">
                            <div class="col-6">
                                <p class="card-text text-white">JANTAN</p>
                                <h1 class="card-title text-white">10</h1>
                            </div>
                            
                            <div class="col-6">
                                <p class="card-text text-white">BETINA</p>
                                <h1 class="card-title text-white">10</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card bg-primary">
                    <div class="card-body text-center">
                        <div class="row">
                            <div class="col-6">
                                <h5 class="card-title text-white">Hewan Kurban Kerbau</h5>
                                <!-- Icon hewan -->
                                <img src="icon-hewan.png" class="img-fluid" alt="Icon Hewan">
                            </div>
                            <div class="col-6">
                                <h1 class="card-title text-white">TOTAL</h1>
                                <h1 class="card-title text-white font-weight-bold">20</h1>
                            </div>
                        </div>
                        <hr class="text-white">
                        <div class="row">
                            <div class="col-6">
                                <p class="card-text text-white">JANTAN</p>
                                <h1 class="card-title text-white">10</h1>
                            </div>
                            
                            <div class="col-6">
                                <p class="card-text text-white">BETINA</p>
                                <h1 class="card-title text-white">10</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card bg-primary">
                    <div class="card-body text-center">
                        <div class="row">
                            <div class="col-6">
                                <h5 class="card-title text-white">Hewan Kurban Kambing</h5>
                                <!-- Icon hewan -->
                                <img src="icon-hewan.png" class="img-fluid" alt="Icon Hewan">
                            </div>
                            <div class="col-6">
                                <h1 class="card-title text-white">TOTAL</h1>
                                <h1 class="card-title text-white font-weight-bold">20</h1>
                            </div>
                        </div>
                        <hr class="text-white">
                        <div class="row">
                            <div class="col-6">
                                <p class="card-text text-white">JANTAN</p>
                                <h1 class="card-title text-white">10</h1>
                            </div>
                            
                            <div class="col-6">
                                <p class="card-text text-white">BETINA</p>
                                <h1 class="card-title text-white">10</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card bg-primary">
                    <div class="card-body text-center">
                        <div class="row">
                            <div class="col-6">
                                <h5 class="card-title text-white">Hewan Kurban Domba</h5>
                                <!-- Icon hewan -->
                                <img src="icon-hewan.png" class="img-fluid" alt="Icon Hewan">
                            </div>
                            <div class="col-6">
                                <h1 class="card-title text-white">TOTAL</h1>
                                <h1 class="card-title text-white font-weight-bold">20</h1>
                            </div>
                        </div>
                        <hr class="text-white">
                        <div class="row">
                            <div class="col-6">
                                <p class="card-text text-white">JANTAN</p>
                                <h1 class="card-title text-white">10</h1>
                            </div>
                            
                            <div class="col-6">
                                <p class="card-text text-white">BETINA</p>
                                <h1 class="card-title text-white">10</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <div>
    <h5><b>Laporan Jenis Kurban</b></h5>

    
    
    <div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th rowspan="2" class="text-center">No</th>
                <th rowspan="2" class="text-center">Kecamatan</th>
                <th colspan="2" class="text-center">Sapi</th>
                <th colspan="2" class="text-center">Kerbau</th>
                <th colspan="2" class="text-center">Kambing</th>
                <th colspan="2" class="text-center">Domba</th>
                <th rowspan="2" class="text-center">Total Kurban</th>
            </tr>
            <tr>
                <th class="text-center">Jantan</th>
                <th class="text-center">Betina</th>
                <th class="text-center">Jantan</th>
                <th class="text-center">Betina</th>
                <th class="text-center">Jantan</th>
                <th class="text-center">Betina</th>
                <th class="text-center">Jantan</th>
                <th class="text-center">Betina</th>
            </tr>
        </thead>
        <tbody>
            <!-- Isi tabel -->
            <tr>
                <td>1</td>
                <td>Kecamatan A</td>
                <td>5</td>
                <td>3</td>
                <td>2</td>
                <td>4</td>
                <td>10</td>
                <td>8</td>
                <td>6</td>
                <td>7</td>
                <td>45</td>
            </tr>
            <!-- Baris lainnya -->
        </tbody>
    </table>
</div>


</div>


@endsection

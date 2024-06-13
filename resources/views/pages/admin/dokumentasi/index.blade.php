@extends('layouts.app')

@section('content')
{{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> --}}

<style>
    /* .pinggir {
      background-color: rgba(0, 0, 0, .03);
      border-right: 1px solid rgba(0, 0, 0, .125);
    } */
</style>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 d-flex justify-content-between align-items-center p-3 card-header">
                <h4 class="fw-semibold">Dokumentasi</h4>
                <div>
                    {{-- <button class="btn btn-outline-primary">Tahun - 2024</button> --}}
                    {{-- <button class="btn btn-primary">Unduh Laporan</button> --}}
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addItem">Tambah Foto</button>
                </div>
            </div>
            <div class="col-md-3 pt-4 pinggir">
                <div class="accordion" id="accordionExample">
                    <!-- Kecamatan -->
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                Kecamatan
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                @foreach ($kecamatans as $kecamatan)
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="{{ $kecamatan->id }}" id="kecamatan-{{ $kecamatan->id }}" onchange="filterDesa(this)">
                                        <label class="form-check-label" for="kecamatan-{{ $kecamatan->id }}">
                                            {{ $kecamatan->nama }}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <!-- Desa -->
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                Desa
                            </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                            <div class="accordion-body" id="desa-container">
                                <!-- Desa options will be dynamically loaded here -->
                            </div>
                        </div>
                    </div>
                    <!-- Tempat -->
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                Tempat
                            </button>
                        </h2>
                        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                            <div class="accordion-body" id="tempat-container">
                                <!-- Tempat options will be dynamically loaded here -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-9 pt-4">
                <div class="row row-cols-md-2 row-cols-lg-3" id="photo-container">
                    @foreach ($items as $item)
                        <div class="col">
                            <div class="card border-0 mb-3">
                                <img src="{{ asset('assets/images/documentations/'.$item->photo)}}" alt="{{ $item->photo }}" class="card-img-top">

                                <div class="card-body">
                                    <p class="mb-0 text-secondary">{{ $item->caption }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach                    
                </div>
                <div class="d-flex justify-content-center">
                  {{ $items->links() }}
              </div>
            </div>

            <div class="modal" id="addItem" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Tambah Foto</h5>
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('dokumentasi.store') }}" method="post" enctype="multipart/form-data">
                                @csrf

                                <div class="mb-3">
                                    <label for="photo">Tambah Foto</label>
                                    <input type="file" accept="image/*" name="photo" id="photo" class="form-control">
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
    @push('scripts')
        {{-- {{ $dataTable->scripts() }} --}}
    @endpush
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script> --}}
    <script>
        function filterDesa(checkbox) {
          let kecamatanId = checkbox.value;
          if (checkbox.checked) {
              fetch(`/admin/dokumentasi/filter/desa/${kecamatanId}`)
                  .then(response => {
                      if (!response.ok) {
                          throw new Error('Network response was not ok ' + response.statusText);
                      }
                      return response.json();
                  })
                  .then(data => {
                      let container = document.getElementById('desa-container');
                      container.innerHTML = '';  // Clear previous desa options
                      data.forEach(desa => {
                          let div = document.createElement('div');
                          div.classList.add('form-check');
                          div.innerHTML = `
                              <input class="form-check-input" type="checkbox" value="${desa.id}" id="desa-${desa.id}" onchange="filterTempat(this)">
                              <label class="form-check-label" for="desa-${desa.id}">
                                  ${desa.nama}
                              </label>
                          `;
                          container.appendChild(div);
                      });
                  })
                  .catch(error => console.error('There was a problem with the fetch operation:', error));
          } else {
              document.getElementById('desa-container').innerHTML = '';
              document.getElementById('tempat-container').innerHTML = '';
          }
          filterPhotos();
      }

      function filterTempat(checkbox) {
          let desaId = checkbox.value;
          if (checkbox.checked) {
              fetch(`/admin/dokumentasi/filter/tempat/${desaId}`)
                  .then(response => {
                      if (!response.ok) {
                          throw new Error('Network response was not ok ' + response.statusText);
                      }
                      return response.json();
                  })
                  .then(data => {
                      let container = document.getElementById('tempat-container');
                      container.innerHTML = '';  // Clear previous tempat options
                      data.forEach(tempat => {
                          let div = document.createElement('div');
                          div.classList.add('form-check');
                          div.innerHTML = `
                              <input class="form-check-input" type="checkbox" value="${tempat.id}" id="tempat-${tempat.id}" onchange="filterPhotos()">
                              <label class="form-check-label" for="tempat-${tempat.id}">
                                  ${tempat.cutting_place}
                              </label>
                          `;
                          container.appendChild(div);
                      });
                  })
                  .catch(error => console.error('There was a problem with the fetch operation:', error));
          } else {
              document.getElementById('tempat-container').innerHTML = '';
          }
          filterPhotos();
      }

      function filterPhotos() {
          let selectedKecamatan = Array.from(document.querySelectorAll('#collapseOne .form-check-input:checked')).map(cb => cb.value);
          let selectedDesa = Array.from(document.querySelectorAll('#collapseTwo .form-check-input:checked')).map(cb => cb.value);
          let selectedTempat = Array.from(document.querySelectorAll('#collapseThree .form-check-input:checked')).map(cb => cb.value);

          fetch(`/admin/dokumentasi/filter/photos?kecamatan=${selectedKecamatan.join(',')}&desa=${selectedDesa.join(',')}&tempat=${selectedTempat.join(',')}`)
              .then(response => {
                  if (!response.ok) {
                      throw new Error('Network response was not ok ' + response.statusText);
                  }
                  return response.json();
              })
              .then(data => {
                  let container = document.getElementById('photo-container');
                  container.innerHTML = '';  // Clear previous photos
                  data.forEach(item => {
                      let div = document.createElement('div');
                      div.classList.add('col-4');
                      div.innerHTML = `
                          <div class="card border-0 mb-3">
                              <img src="/assets/images/documentations/${item.photo}" alt="${item.photo}" class="card-img-top">
                              <div class="card-body">
                                  <p class="mb-0 text-secondary">${item.caption}</p>
                              </div>
                          </div>
                      `;
                      container.appendChild(div);
                  });
              })
              .catch(error => console.error('There was a problem with the fetch operation:', error));
      }

    </script>
</body>
@endsection

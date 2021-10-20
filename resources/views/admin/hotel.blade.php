@extends('template/adminTemplate')

@section('title', 'Products')

@section('styles')
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous"> 

  <style>
    .adminTitle{
        text-align: center;
    }
    .bg {
        background-color: rgb(226, 230, 248);
    }
    input {
        font-size: 20px
    }
  </style>
@section('body')
<div class="main-panel">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
      <div class="container-fluid">
        
        <div class="navbar-wrapper">
          <h3 class="navbar-brand">Hotels</h3>
          @if (session('status'))
            <div id="status" class="alert alert-success position-absolute top-0 end-0" style="margin-right:30px;margin-top:30px" role="alert">
              {{ session('status') }}
            </div>
          @endif
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
          <span class="sr-only">Toggle navigation</span>
          <span class="navbar-toggler-icon icon-bar"></span>
          <span class="navbar-toggler-icon icon-bar"></span>
          <span class="navbar-toggler-icon icon-bar"></span>
        </button>
      </div>
    </nav>
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
          <a href="/adminAddHotel">
            <button class="btn btn-info">
              <span class="material-icons">add_circle</span>
              Add Hotel
            </button>
          </a>
          <div class="row">
            <div class="table-responsive">
                <table class="table">
                    <thead class="table-dark">
                        <tr style="font-weight: bold">
                            <th>#</th>
                            <th><h5>Hotel</h5></th>
                            <th><h5>Kota</h5></th>
                            <th><h5>Negara</h5></th>
                            <th><h5>Fasilitas</h5></th>
                            <th><h5>Harga</h5></th>
                            <th><h5>Gambar</h5></th>
                            <th><h5>Stok</h5></th>
                            <th><h5>Bintang</h5></th>
                            <th><h5>Actions</h5></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($hotels as $item) 
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$item->nama_hotel}}</td>
                                <td>{{$item->kota}}</td>
                                <td>{{$item->negara}}</td>
                                <td>{{$item->fasilitas}}</td>
                                <td>Rp {{$item->harga}}</td>
                                <td>
                                    <img src="storage/assets/hotel/{{$item->gambar}}" alt="{{$item->nama_hotel}}" style="width: 70px">
                                </td>
                                <td>{{$item->stok_kamar}}</td>
                                <td>
                                    @for ($i = 1; $i <= $item->bintang; $i++)
                                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16" style="color:#FFD700;">
                                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                    </svg>
                                @endfor
                                </td>
                                <td>
                                    <button class="btn btn-success btn-fab btn-fab-mini btn-round" data-toggle="modal" data-target="#{{$item->id}}">
                                        <i class="material-icons">edit</i>
                                    </button>
                                    <form action="/deleteHotel/{{ $item->id }}" method="POST" class="d-inline">
                                      @method('delete')
                                      @csrf
                                      <button class="btn btn-danger btn-fab btn-fab-mini btn-round" type="submit">
                                          <i class="material-icons">delete</i>
                                      </button>
                                    </form>
                                </td>
                            </tr>

                            <!-- Modal -->
                            <div id="{{$item->id}}" class="modal bd-example-modal-lg" tabindex="-1" role="dialog">
                                <div class="modal-dialog modal-lg" role="document">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" style="border: none">Edit Data</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body">
                                      <form action="/updateHotel/{{$item->id}}" method="post" enctype="multipart/form-data">
                                        @method('patch')
                                        @csrf
                                        <div class="form-group">
                                          <label for="nama_hotel">Nama Hotel</label>
                                          <input type="text" class="form-control @error('nama_hotel') is-invalid @enderror" name="nama_hotel" value="{{$item->nama_hotel}}">
                                          @error('nama_hotel')
                                            <div class="invalid-feedback">
                                              {{$message}}
                                            </div>
                                          @enderror
                                        </div>
                                        <div class="form-group">
                                          <label for="harga">Harga</label>
                                          <input type="number" class="form-control @error('harga') is-invalid @enderror" name="harga" value="{{$item->harga}}">
                                          @error('harga')
                                            <div class="invalid-feedback">
                                              {{$message}}
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                          <label for="kota">Kota</label>
                                          <input type="text" class="form-control @error('kota') is-invalid @enderror" name="kota" value="{{$item->kota}}">
                                          @error('kota')
                                          <div class="invalid-feedback">
                                            {{$message}}
                                          </div>
                                          @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="gambar">Gambar</label>
                                            <input type="file" class="form-control form-control-lg @error('gambar') is-invalid @enderror" name="gambar" value="{{$item->gambar}}">
                                          @error('gambar')
                                            <div class="invalid-feedback">
                                              {{$message}}
                                            </div>
                                          @enderror
                                        </div>
                                        <div class="form-group">
                                          <label for="negara">Negara</label>
                                          <input type="text" class="form-control @error('negara') is-invalid @enderror" name="negara" value="{{$item->negara}}">
                                          @error('negara')
                                            <div class="invalid-feedback">
                                              {{$message}}
                                            </div>
                                          @enderror
                                        </div>
                                        <div class="form-group">
                                          <label for="bintang">Bintang</label>
                                          <input type="text" class="form-control @error('bintang') is-invalid @enderror" name="bintang" value="{{$item->bintang}}">
                                          @error('bintang')
                                            <div class="invalid-feedback">
                                              {{$message}}
                                            </div>
                                          @enderror
                                        </div>
                                        <div class="form-group">
                                          <label for="stok">Stok</label>
                                          <input type="number" class="form-control @error('stok_kamar') is-invalid @enderror" name="stok" value="{{$item->stok_kamar}}">
                                          @error('stok')
                                            <div class="invalid-feedback">
                                              {{$message}}
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                          <label for="fasilitas">Fasilitas</label>
                                          <input type="text" class="form-control @error('fasilitas') is-invalid @enderror" name="fasilitas" value="{{$item->fasilitas}}">
                                          @error('fasilitas')
                                            <div class="invalid-feedback">
                                              {{$message}}
                                            </div>
                                          @enderror
                                        </div>
                                        <button class="btn btn-primary" type="submit">Save</button>
                                      </form>
                                    </div>
                                  </div>
                                </div>
                              </div>
                        @endforeach
                    </tbody>
                </table>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection

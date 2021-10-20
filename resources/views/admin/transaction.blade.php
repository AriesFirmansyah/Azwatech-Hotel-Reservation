@extends('template/adminTemplate')

@section('title', 'Transaction')

@section('styles')
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous"> 

  <style>
      .hotel {
            box-shadow: 2px 5px 8px 3px #d1d1d1;
        }
  </style>
@section('body')
<div class="main-panel">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
      <div class="container-fluid">
        
        <div class="navbar-wrapper">
          <h3 class="navbar-brand">Transaction</h3>
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
          @if($kondisi !== "kosong")
            @foreach ($invoice as $data)
                <div class="container">
                    <br>
                    <div class="hotel">
                        <div class="row">
                            <div class="col-12" >
                                <div class="row" style="">
                                    <div class="col-5">
                                        <img src="{{ asset('storage/assets/hotel/'.$data->gambar_hotel) }}" alt="" style="max-width: 100%;">
                                    </div>
                                    <div class="col-4 mt-1">
                                        <h2 style="text-transform: capitalize">{{$data->nama_hotel}}</h2>
                                        <div style="text-align: left;margin-top:-10px">
                                            @for ($i = 1; $i <= $data->bintang_hotel; $i++)
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16" style="color:#FFD700;">
                                                    <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                                </svg>
                                            @endfor
                                        </div>
                                        
                                        <div class="d-flex mt-3">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt-fill" viewBox="0 0 16 16" style="margin-top:6px">
                                                <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"/>
                                            </svg>
                                            <p class="text-muted" style="font-size: 20px;font-weight:900; margin-left:5px">{{$data->kota_hotel}}, {{$data->negara_hotel}}</p>
                                        </div>
                                        <div class="d-flex mt-3">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-door-closed-fill" viewBox="0 0 16 16" style="margin-top:6px">
                                                <path d="M12 1a1 1 0 0 1 1 1v13h1.5a.5.5 0 0 1 0 1h-13a.5.5 0 0 1 0-1H3V2a1 1 0 0 1 1-1h8zm-2 9a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
                                            </svg>
                                            <p class="text-muted" style="font-size: 20px;font-weight:900; margin-left:5px">Jumlah Kamar : {{$data->jumlah_kamar}}</p>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div style="border: 2px solid rgb(231, 231, 231)">
                                            <div class="p-2" style="background:rgb(231, 231, 231)">
                                                <h3>Check-in</h3>
                                            </div>
                                            <p class="text-muted">
                                                <strong>
                                                    {{ DATE_FORMAT(new DateTime($data->tgl_check_in), "d M Y")}}
                                                </strong>
                                            </p>
                                        </div><br>
                                        <div style="border: 2px solid rgb(231, 231, 231)">
                                            <div class="p-2" style="background:rgb(231, 231, 231)">
                                                <h3>Check-out</h3>
                                            </div>
                                            <p class="text-muted">
                                                <strong>
                                                    {{ DATE_FORMAT(new DateTime($data->tgl_check_out), "d M Y")}}
                                                </strong>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <br><br>
                                <div class="container">
                                    <table id="productTable" class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col" class="border-0 bg-light">
                                                    <div class="p-2 px-3 text-uppercase">Nama Penyewa</div>
                                                </th>
                                                <th scope="col" class="border-0 bg-light">
                                                    <div class="py-2 text-uppercase">Email</div>
                                                </th>
                                                <th scope="col" class="border-0 bg-light">
                                                    <div class="py-2 text-uppercase">Phone</div>
                                                </th>
                                                <th scope="col" class="border-0 bg-light">
                                                    <div class="py-2 text-uppercase">Tgl booking</div>
                                                </th>
                                                <th scope="col" class="border-0 bg-light">
                                                    <div class="py-2 text-uppercase">Waktu booking</div>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="align-middle" style="padding-left: 15px;text-transform:capitalize">
                                                    <strong>{{$data->nama_lengkap}}</strong>
                                                </td>
                                                <td class="align-middle">
                                                    <strong>{{$data->email}}</strong>
                                                </td>
                                                <td class="align-middle">
                                                    <strong>{{$data->no_telp}}</strong>
                                                </td>
                                                <td class="align-middle">
                                                    <strong>{{ DATE_FORMAT(new DateTime($data->created_at), "d M Y")}}</strong>
                                                </td>
                                                <td class="align-middle">
                                                    <strong>{{ DATE_FORMAT(new DateTime($data->created_at), "h:i:s A")}}</strong>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
            @endforeach
        @else
            <h1 style="text-align: center">Tidak ada transaksi!</h1>
        @endif
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

@endsection

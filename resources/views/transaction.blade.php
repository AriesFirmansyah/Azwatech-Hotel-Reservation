@extends('template/mainTemplate')
@section('title', 'Transaction')
@section('styles')
    <style>
        * {
            margin: 0;
            padding: 0;
        }
        html, body {
            height: 100%;
        }
        .hotel {
            box-shadow: 2px 5px 8px 3px #d1d1d1;
        }
    </style>
@section('body')
<div class="row ">
    @if ($transaction !== "kosong")
        <div class="col-md-12 ">
            <div class="container">
                <br><br>
                <h1 class="text-center text-muted">Transaction</h1>
                @foreach ($transaction as $data)
                    <div class="container">
                        <div class="hotel">
                            <div class="row">
                                <div class="col-md-5">
                                    <img src="storage/assets/hotel/{{$data->gambar_hotel}}" alt="{{$data->nama_hotel}}" style="max-width: 100%;">
                                </div>
                                <div class="col-md-4 mt-1">
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
                                    <div class="mt-4">
                                        <p style="font-size: 16px;font-weight:900; margin-left:5px">Summary</p>
                                        
                                    </div>
                                    <div class="d-flex mt-1" style="margin-left: 5px">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cash-coin" viewBox="0 0 16 16" style="margin-top:6px">
                                            <path fill-rule="evenodd" d="M11 15a4 4 0 1 0 0-8 4 4 0 0 0 0 8zm5-4a5 5 0 1 1-10 0 5 5 0 0 1 10 0z"/>
                                            <path d="M9.438 11.944c.047.596.518 1.06 1.363 1.116v.44h.375v-.443c.875-.061 1.386-.529 1.386-1.207 0-.618-.39-.936-1.09-1.1l-.296-.07v-1.2c.376.043.614.248.671.532h.658c-.047-.575-.54-1.024-1.329-1.073V8.5h-.375v.45c-.747.073-1.255.522-1.255 1.158 0 .562.378.92 1.007 1.066l.248.061v1.272c-.384-.058-.639-.27-.696-.563h-.668zm1.36-1.354c-.369-.085-.569-.26-.569-.522 0-.294.216-.514.572-.578v1.1h-.003zm.432.746c.449.104.655.272.655.569 0 .339-.257.571-.709.614v-1.195l.054.012z"/>
                                            <path d="M1 0a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h4.083c.058-.344.145-.678.258-1H3a2 2 0 0 0-2-2V3a2 2 0 0 0 2-2h10a2 2 0 0 0 2 2v3.528c.38.34.717.728 1 1.154V1a1 1 0 0 0-1-1H1z"/>
                                            <path d="M9.998 5.083 10 5a2 2 0 1 0-3.132 1.65 5.982 5.982 0 0 1 3.13-1.567z"/>
                                        </svg>
                                        <p class="text-muted" style="font-size: 17px;font-weight:900; margin-left:5px">Rp {{ number_format($data->harga, 0,",", ".")  }}</p>
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
                                    <a href="/invoice/{{$data->nama_hotel}}">
                                        <button class="btn btn-dark mt-5 rounded-pill py-2 btn-block" data-bs-toggle="modal" data-bs-target="#inv{{$data->id}}">
                                            Details
                                        </button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                @endforeach
            </div>
        </div>
    @else 
        <h1 class="text-muted text-center mt-5">Tidak ada daftar transaksi!</h1>
    @endif
</div>

@endsection
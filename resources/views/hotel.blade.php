@extends('template/mainTemplate')
@section('title', 'Azwatech')
@section('styles')
    <style>
        * {
            margin: 0;
            padding: 0;
        }
        html, body {
            height: 100%;
        }
        .phone {
            /* max-width: 300px; */
            box-shadow: 2px 5px 8px 3px #d1d1d1;
            background-color: white;
            padding: 50px;
            padding-left: 100px;
            padding-right: 100px;
            margin-bottom: 30px;
            border-radius: 50px
        }
        .phone img {
            width: 40px
        }
        .phone_number {
            color: #004da5;
            word-wrap: break-word;
        }
        .header {
            background: #2BC0E4;  /* fallback for old browsers */
            background: -webkit-linear-gradient(to right, #EAECC6, #2BC0E4);  /* Chrome 10-25, Safari 5.1-6 */
            background: linear-gradient(to right, #EAECC6, #2BC0E4); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */

            text-align: center;
            padding-bottom: 80px;
            padding-top: 0px
        }
        .textbottom {
            /* margin-top: 30px; */
            margin-bottom: 266px
        }
        .leftside {
            /* border: 5px solid rgb(44, 44, 44); */
            border-left: none;
            border-radius: 15px;
            padding: 10px
        }
        .hotel {
            box-shadow: 2px 5px 8px 3px #d1d1d1;
        }
    </style>
@section('body')
<div>
    <div class="header">
        <div class="container p-md-5">
            <h1>WEBSITE MEMESAN KAMAR HOTEL</h1>
            <h2>Sudah dipercaya 7.000.000 pelanggan azwatech</h2>
        </div>
    </div>
    <div data-aos="fade-up">
        <div class="container" style="text-align: center;margin-top:-80px; ">
            <div class="row">
                <div class="col-12">
                    <div class="phone">
                        <form action="/hotel" method="post">
                            @csrf
                            <div class="input-group input-group-lg mb-3">
                                <span class="input-group-text bg-transparent" id="basic-addon1" style="border-right:none;padding-left:20px;border-top-left-radius:20px;border-bottom-left-radius:20px">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                                    </svg>
                                </span>
                                <input type="text" name="kota" list="datalistOptions" class="form-control searching" placeholder="Enter a destination . . ." aria-label="Username" aria-describedby="basic-addon1"
                                style="border-left: none; border-radius:20px;border-top-left-radius:0px;border-bottom-left-radius:0px">
                                <datalist id="datalistOptions">
                                    @foreach ($autocomplete as $data)
                                        <option value="{{$data->kota}}">
                                    @endforeach
                                </datalist>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <h3 style="text-align: left">Check-in</h3>
                                    <input name="check_in" class="form-control form-control-lg" type="date" placeholder=".form-control-lg" aria-label=".form-control-lg example">
                                </div>
                                <div class="col-md-6">
                                    <h3 style="text-align: left">Check-out</h3>
                                    <input name="check_out" class="form-control form-control-lg" type="date" placeholder=".form-control-lg" aria-label=".form-control-lg example">
                                </div>
                                <div class="col-6">
                                    <br>
                                    <input class="form-control form-control-lg" type="number" placeholder="Jumlah Tamu" aria-label=".form-control-lg example">
                                </div>
                                <div class="col-md-6">
                                    <br>
                                    <input name="jumlah_kamar" class="form-control form-control-lg" type="number" placeholder="Jumlah Kamar" aria-label=".form-control-lg example">
                                </div>
                            </div>
                            <br>
                            <button type="submit" class="btn btn-success btn-lg" style="border-radius: 8px">
                                SEARCH
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row ">
    @if ($kota !== 'kosong')
        <h1 class="text-center text-muted mt-5 mb-5" style="text-transform: uppercase">{{$kota}}</h1>
    @endif
    <div class="col-md-3 ">
        <div class="leftside">
            <h2>Filter Pencarian Hotel</h2>
            <div class="accordion accordion-flush" id="accordionFlushExample">
                <div class="accordion-item">
                  <h2 class="accordion-header" id="flush-headingOne">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                      Tarif Kamar per malam
                    </button>
                  </h2>
                  <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                        <div class="row">
                            <div class="col-12">
                                <form action="/hotel" method="post" id="filterHargaMin">
                                    @csrf
                                    <input type="hidden" name="bintang" value="{{$bintang}}">
                                    <input type="hidden" name="kota" value="{{$kota}}">
                                    <input type="hidden" name="harga_max" value="{{$hargaMax}}">
                                    <label class="form-label">Harga min</label>
                                    <div class="input-group input-group-lg mb-3">
                                        <span class="input-group-text bg-transparent" id="basic-addon1" style="border-right:none;border-top-left-radius:20px;border-bottom-left-radius:20px">
                                            Rp
                                        </span>
                                        <input name="harga_min" type="number" class="form-control" aria-describedby="basic-addon1"
                                        style="border-left: none; border-radius:20px;border-top-left-radius:0px;border-bottom-left-radius:0px"
                                        value="{{$hargaMin}}"
                                        onchange="event.preventDefault(); document.getElementById('filterHargaMin').submit();">
                                    </div>
                                </form>
                            </div>
                            <div class="col-12">
                                <form action="/hotel" method="post" id="filterHargaMax">
                                    @csrf
                                    <input type="hidden" name="bintang" value="{{$bintang}}">
                                    <input type="hidden" name="kota" value="{{$kota}}">
                                    <input type="hidden" name="harga_min" value="{{$hargaMin}}">
                                    <label class="form-label">Harga max</label>
                                    <div class="input-group input-group-lg mb-3">
                                        <span class="input-group-text bg-transparent" id="basic-addon1" style="border-right:none;border-top-left-radius:20px;border-bottom-left-radius:20px">
                                            Rp
                                        </span>
                                        <input name="harga_max" type="number" class="form-control" aria-describedby="basic-addon1"
                                        style="border-left: none; border-radius:20px;border-top-left-radius:0px;border-bottom-left-radius:0px"
                                        value="{{$hargaMax}}"
                                        onchange="event.preventDefault(); document.getElementById('filterHargaMax').submit();">
                                        
                                    </div>
                                </form>
                            </div>
                            <div class="col-12 mt-3">
                                <p class="text-muted">*note : click the other area or press enter for refresh filter</p>
                            </div>
                        </div>
                    </div>
                  </div>
                </div>
                <div class="accordion-item">
                  <h2 class="accordion-header" id="flush-headingTwo">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                      Bintang
                    </button>
                  </h2>
                  <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                        <form action="/hotel" method="post" id="filterBintang1">
                            @csrf
                            <input type="hidden" name="kota" value="{{$kota}}">
                            <input type="hidden" name="harga_min" value="{{$hargaMin}}">
                            <input type="hidden" name="harga_max" value="{{$hargaMax}}">
                            <div class="form-check">                                                                                                                                                                
                                <input name="bintang" class="form-check-input" type="checkbox" value="1" {{$bintang == 1 ? 'checked' : ''}}
                                onchange="event.preventDefault(); document.getElementById('filterBintang1').submit();">
                                <label class="form-check-label" for="flexCheckDefault">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16" style="color:#FFD700;">
                                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                    </svg>
                                </label>
                            </div>
                        </form>
                        <br>
                        <form action="/hotel" method="post" id="filterBintang2">
                            @csrf
                            <input type="hidden" name="kota" value="{{$kota}}">
                            <input type="hidden" name="harga_min" value="{{$hargaMin}}">
                            <input type="hidden" name="harga_max" value="{{$hargaMax}}">
                            <div class="form-check">
                                <input name="bintang" class="form-check-input" type="checkbox" value="2" {{$bintang == 2 ? 'checked' : ''}}
                                onchange="event.preventDefault(); document.getElementById('filterBintang2').submit();">
                                <label class="form-check-label" for="flexCheckChecked">
                                    @for ($i = 1; $i <= 2; $i++)
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16" style="color:#FFD700;">
                                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                        </svg>
                                    @endfor
                                </label>
                            </div>
                        </form>
                        <br>
                        <form action="/hotel" method="post" id="filterBintang3">
                            @csrf
                            <input type="hidden" name="kota" value="{{$kota}}">
                            <input type="hidden" name="harga_min" value="{{$hargaMin}}">
                            <input type="hidden" name="harga_max" value="{{$hargaMax}}">
                            <div class="form-check">
                                <input name="bintang" class="form-check-input" type="checkbox" value="3" {{$bintang == 3 ? 'checked' : ''}}
                                onchange="event.preventDefault(); document.getElementById('filterBintang3').submit();">
                                <label class="form-check-label" for="flexCheckChecked">
                                    @for ($i = 1; $i <= 3; $i++)
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16" style="color:#FFD700;">
                                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                        </svg>
                                    @endfor
                                </label>
                            </div>
                        </form>
                        <br>
                        <form action="/hotel" method="post" id="filterBintang4">
                            @csrf
                            <input type="hidden" name="kota" value="{{$kota}}">
                            <input type="hidden" name="harga_min" value="{{$hargaMin}}">
                            <input type="hidden" name="harga_max" value="{{$hargaMax}}">
                            <div class="form-check">
                                <input name="bintang" class="form-check-input" type="checkbox" value="4" {{$bintang == 4 ? 'checked' : ''}}
                                onchange="event.preventDefault(); document.getElementById('filterBintang4').submit();">
                                <label class="form-check-label" for="flexCheckChecked">
                                    @for ($i = 1; $i <= 4; $i++)
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16" style="color:#FFD700;">
                                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                        </svg>
                                    @endfor
                                </label>
                            </div>
                        </form>
                        <br>
                        <form action="/hotel" method="post" id="filterBintang5">
                            @csrf
                            <input type="hidden" name="kota" value="{{$kota}}">
                            <input type="hidden" name="harga_min" value="{{$hargaMin}}">
                            <input type="hidden" name="harga_max" value="{{$hargaMax}}">
                            <div class="form-check">
                                <input name="bintang" class="form-check-input" type="checkbox" value="5" {{$bintang == 5 ? 'checked' : ''}}
                                onchange="event.preventDefault(); document.getElementById('filterBintang5').submit();">
                                <label class="form-check-label" for="flexCheckChecked">
                                    @for ($i = 1; $i <= 5; $i++)
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16" style="color:#FFD700;">
                                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                        </svg>
                                    @endfor
                                </label>
                            </div>
                        </form>
                    </div>
                  </div>
                </div>
            </div>
            <form id="filterLokasi" action="/hotel" method="post">
                @csrf
                <input type="hidden" name="bintang" value="{{$bintang}}">
                <input type="hidden" name="harga_min" value="{{$hargaMin}}">
                <input type="hidden" name="harga_max" value="{{$hargaMax}}">
                <div class="form-floating">
                    <select name="kota" class="form-select" id="floatingSelect" aria-label="Floating label select example"
                    onchange="event.preventDefault(); document.getElementById('filterLokasi').submit();">
                    @foreach($autocomplete as $dataKota)
                        <option value="{{$dataKota->kota}}">{{$dataKota->kota}}</option>
                        @if ($dataKota->kota == $kota)
                            <option selected disabled>{{$kota}}</option>
                        @endif
                    @endforeach
                    @if ($kota == 'kosong')
                        <option selected>Open this select menu</option>
                    @else
                        <option value="kosong">All Location</option>
                    @endif
                </select>
                    <label for="floatingSelect">Lokasi</label>
                </div>
            </form>
            <!-- geral -->
            {{-- <select id="filter-bintang" class="form-control filter">
                <option selected value="">Pilih Bintang</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
                <option value="4">Four</option>
                <option value="5">Five</option>
            </select> --}}
        </div>
    </div>
    <div class="col-md-8 ">
        <div class="rightside">
            <div class="row">
                <div class="col-12">
                    @foreach ($hotel as $data)
                        <div class="container">
                            <div class="hotel">
                                <div class="row">
                                    <div class="col-5">
                                        <a href="/hotelDetails/{{$data->nama_hotel}}">
                                            <img src="storage/assets/hotel/{{$data->gambar}}" alt="{{$data->nama_hotel}}" style="max-width: 100%;">
                                        </a>
                                    </div>
                                    <div class="col-4 mt-1">
                                        <a href="/hotelDetails/{{$data->nama_hotel}}" style="text-align: left;color:black">
                                            <h2 style="text-transform: capitalize">{{$data->nama_hotel}}</h2>
                                            <div style="text-align: left;margin-top:-10px">
                                                @for ($i = 1; $i <= $data->bintang; $i++)
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16" style="color:#FFD700;">
                                                    <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                                </svg>
                                                @endfor
                                            </div>
                                        </a>
                                        <div class="d-flex mt-3">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt-fill" viewBox="0 0 16 16" style="margin-top:6px">
                                                <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"/>
                                            </svg>
                                            <p class="text-muted" style="font-size: 20px;font-weight:900; margin-left:5px">{{$data->kota}}, {{$data->negara}}</p>
                                        </div>
                                    </div>
                                    <div class="col-3" style="border-left: 2px solid rgb(231, 231, 231)">
                                        <h3 class="mt-3">Rp {{ number_format($data->harga, 0,",", ".")  }}</h3>
                                        <p class="text-muted">Termasuk Pajak</p>
                                        <a href="/booking/{{$data->nama_hotel}}">
                                            <button class="btn btn-primary">Booking Now</button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<!-- geral -->
<script>
    $(".filter").on("change",function(){
        let bintang = $("#filter-bintang").val()
        console.log(bintang)
    })
</script>
@endsection
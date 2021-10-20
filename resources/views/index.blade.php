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
        .kotaPopuler {
            background: #11998e;  /* fallback for old browsers */
            background: -webkit-linear-gradient(to right, #38ef7d, #11998e);  /* Chrome 10-25, Safari 5.1-6 */
            background: linear-gradient(to right, #38ef7d, #11998e); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */

            padding: 10px;
            padding-left: 30px;
            text-decoration: underline;
            border-radius: 25px;
        }
        .pesanKamar {
            background: #d53369;  /* fallback for old browsers */
            background: -webkit-linear-gradient(to right, #cbad6d, #d53369);  /* Chrome 10-25, Safari 5.1-6 */
            background: linear-gradient(to right, #cbad6d, #d53369); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */

            padding: 10px;
            padding-left: 30px;
            text-decoration: underline;
            border-radius: 25px;
        }

        .kota {
            color:white;
            position:absolute;
            margin-left:20px;
        }
        .totalHotel {
            color:white;
            margin-top:65px;
            position:absolute;
            margin-left:20px; 
            border:2px solid white;
            padding:5px
        }
        .avgPrice {
            position:absolute;
            color:white;
            float: right;
            margin-top: -65px;
            margin-left: 20px;
        }
        .hover:hover {
            opacity: 0.7;
            transition: 0.3s
        }
        
    </style>
@section('body')
<div>
    <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active" data-bs-interval="5000">
            <a href="#kotaPopuler">
              <img src="storage/assets/carousel1.png" class="d-block w-100" style="max-height: 100%">
            </a>
          </div>
          <div class="carousel-item" data-bs-interval="5000" >
            <a href="#pesanKamar">
              <img src="storage/assets/carousel2.png" class="d-block w-100" style="max-height: 100%">
            </a>
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval"  data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval"  data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
    </div>
    <div class="container text-center">
        <br>
        <br>
        <div class="text-center">
            <h1>Mengapa memesan di Azwatech?</h1>
            <br>
            <div class="row">
                <div class="col-md-4">
                    <img src="storage/assets/best_price.png" alt="" style="max-width: 100%;height:200px">
                    <h1>Harga Terbaik</h1>
                    <p style="text-align: justify">Memesan kamar di Azwatech menjamin Anda bisa menghemat biaya lebih banyak. Sebab, harga kamar hotel di Azwatech merupakan penawaran terbaik dengan jaminan harga kompetitif. Untuk bisa memesan kamar hotel di Azwatech, Anda pun hanya perlu terhubung dengan internet.</p>
                </div>
                <div class="col-md-4">
                    <img src="storage/assets/special_feature.png" alt="" style="max-width: 100%;height:200px">
                    <h1>Fitur Spesial</h1>
                    <p style="text-align: justify">Layanan kamar hotel Azwatech memastikan pengalaman berlibur yang menyenangkan karena didukung oleh sejumlah fitur modern. Fitur-fitur tersebut membantu pengguna melakukan pembelian dengan jauh lebih praktis, seperti fitur Filter dan Sortir untuk memudahkan pencarian kamar hotel.</p>
                </div>
                <div class="col-md-4">
                    <img src="storage/assets/wide_range.png" alt="" style="max-width: 100%;height:200px">
                    <h1>Jangkauan Luas</h1>
                    <p style="text-align: justify">Jika kamu ingin memesan tempat penginapan di luar negeri, maka Azwatech adalah aplikasi yang tepat. Entah tujuan liburan kamu ke Amerika Serikat, Selandia Baru, Australia dan Jepang, Azwatech menyediakan pilihan hotel dengan harga yang cukup terjangkau.</p>
                </div>
            </div>
        </div>
        <br><br><br>
        <div data-aos="fade-up">
            <div id="kotaPopuler" class="kotaPopuler" style="max-width: 400px">
                <h2>Kota Populer</h2>
            </div><br>
            <div class="row">
                <div class="col-md-6 hover btn"
                    onclick="event.preventDefault(); document.getElementById('searchBandung').submit();">
                    <form action="/hotel" method="post" id="searchBandung">
                        @csrf
                        <input type="hidden" name="kota" value="Bandung">
                        <h1 class="kota" style="margin-top:15px;">
                            Bandung
                        </h1>
                        <div class="totalHotel">
                            <h3>{{$bandung}} Hotel</h3>
                        </div>
                        <img src="storage/assets/bandung.jpg" alt="bandung" style="max-width: 100%;height:350px;border-radius:10px">
                        <h2 class="avgPrice">Average Price</h2>
                        <h3 class="avgPrice" style="margin-top: -30px">Rp {{ number_format($bandung_avg, 0,",", ".")  }}</h3>
                    </form>
                    <br><br>
                </div>
                <div class="col-md-6 hover btn"
                    onclick="event.preventDefault(); document.getElementById('searchSurabaya').submit();">
                    <form action="/hotel" method="post" id="searchSurabaya">
                        @csrf
                        <input type="hidden" name="kota" value="Surabaya">
                        <h1 class="kota" style="margin-top:15px;">
                            Surabaya
                        </h1>
                        <div class="totalHotel">
                            <h3>{{$surabaya}} Hotel</h3>
                        </div>
                        <img src="storage/assets/surabaya.jpg" alt="surabaya" style="max-width: 100%;height:350px;border-radius:10px">
                        <h2 class="avgPrice">Average Price</h2>
                        <h3 class="avgPrice" style="margin-top: -30px">Rp {{ number_format($surabaya_avg, 0,",", ".")  }}</h3>
                    </form>
                </div>
            </div>
        </div>
        <br>
        <div>
            <div id="pesanKamar" class="pesanKamar" style="max-width: 400px">
                <h2>Pesan Kamar</h2>
            </div><br>
            <div class="row" style="text-align: center">
                @foreach ($hotel as $data)
                    <div class="col-md-4 hover">
                        <a href="/hotelDetails/{{$data->nama_hotel}}" style="color:black">
                            <img src="storage/assets/hotel/{{$data->gambar}}" alt="" style="max-width: 100%;border-radius:10px;height:330px">
                            <div style="text-align: left; margin-left:10px;margin-top:5px">
                                @for ($i = 1; $i <= $data->bintang; $i++)
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16" style="color:#FFD700;">
                                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                    </svg>
                                @endfor
                                <p style="font-size: 20px;font-weight:900;margin-top:5px">{{$data->nama_hotel}}</p>
                                <p class="text-muted" style="font-size: 20px;font-weight:900;margin-top:-10px">{{$data->kota}}</p>
                            </div>
                        </a>
                        <br><br>
                    </div>
                @endforeach
                <a href="/hotel" class="mt-5" style="color:black">
                    Lihat lebih banyak
                </a>
            </div>

        </div>

        <br><br><br>
    </div>
</div>

@endsection
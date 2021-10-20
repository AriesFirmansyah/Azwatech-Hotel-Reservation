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
            padding: 20px;
            margin-bottom: 30px
        }
        .phone img {
            width: 40px
        }
        .phone_number {
            color: #004da5;
            word-wrap: break-word;
        }
        .header {
            background: #ad5389;  /* fallback for old browsers */
            background: -webkit-linear-gradient(to right, #3c1053, #ad5389);  /* Chrome 10-25, Safari 5.1-6 */
            background: linear-gradient(to right, #3c1053, #ad5389); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
            text-align: center;
            padding-bottom: 130px;
            padding-top: 80px
        }
        .textbottom {
            /* margin-top: 30px; */
            margin-bottom: 266px
        }
    </style>
@section('body')
<div>
    <div class="header">
        <div class="container p-md-5">
            <h1>Pentingnya Liburan</h1>
            <p>Rutinitas harian kita membuat mata kita buta dalam melihat keindahan hidup. Liburan sehari menyadarkan kita akan indahnya hidup ini.</p>

        </div>
    </div>
    <div data-aos="fade-up">
    {{-- <img src="{{ asset('storage/assets/contactUs.jpg') }}" alt="contact" > --}}
    <div class="container" style="text-align: center;margin-top:-80px; ">
        <div class="row">
            <div class="col-md-6">
                <div class="phone">
                    <img src="{{ asset('storage/assets/phone.png') }}" alt="phone">
                    <h5><b>TAKE TO SALES</b></h5>
                    <p>Azwatech yaitu situs yang reservasi hotel online yang terbesar di Asia Pasifik pada saat ini. Kenapa memilih azwatech. Azwatech menyediakan wadah online di mana kita bisa mencari berbagai akomodasi dan tempat penginapan sementara.</p>
                    <br>
                    <h4 class="phone_number"><b>+628 089 656 195 418</b></h4>
                </div>
            </div>
            <div class="col-md-6">
                <div class="phone">
                    <img src="{{ asset('storage/assets/email.png') }}" alt="phone">
                    <h5><b>EMAIL US</b></h5>
                    <p>Kirimlah email dengan sederhana dan jelas. Tidak perlu membuat email dengan kosakata yang indah ataupun bahasa yang baku, karena tidak ada rumus untuk membuat email yang sempurna, keaslian dan kejujuran pesanlah yang membuatnya sempurna.</p>
                    <br>
                    <h4 class="phone_number"><b>aries.firmansyah@student.umn.ac.id</b></h4>
                </div>
                <br>
            </div>
            <div>
            <div data-aos="flip-up">
            <p class="textbottom">Liburan terbaik bukanlah soal kemewahan, tetapi soal kebersamaan di tengah keluarga tercinta.</p>
            <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    </div>
        </div>
    </div>
</div>

@endsection
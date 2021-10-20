@extends('template/mainTemplate')
@section('title', 'Booking')
@section('styles')
    <style>
        * {
            margin: 0;
            padding: 0;
        }
        html, body {
            height: 100%;
        }
        .hover:hover {
            opacity: 0.7;
        }
        .booking {
            box-shadow: 2px 5px 8px 3px #d1d1d1;
            border-radius: 15px;
        }
        .inpimage {
            width: 30px;
        }
        .input{
            padding: 10px;
            border: none;
            outline: none;
            font-weight: bold;
            letter-spacing: 1px;
            transition: 0.5s;
            border-radius: 100px;
            box-shadow: 2px 5px 8px 3px #d1d1d1;
            max-width: 100%;
        }

        form input{
            padding: 10px;
            color: black;
            background-color: transparent;
            border: none;
            outline: none;
            font-weight: bold;
            letter-spacing: 2px;
            transition: 0.5s;
        }

        form input::placeholder{
            color: black
            font-weight: 200;
            letter-spacing: 2px;
            margin-left: 10px;
        }
        i {
            cursor: pointer;
            float: right;
        }
        
    </style>
@section('body')
<div>
    <div class="container">
        <br>
        <div class="booking">
            <div class="row">
                <div class="col-12">
                    <div class="container" style="max-width:100%;padding:40px;">
                        <h2 style="text-align: center">Booking Form</h2>
                        @foreach ($hotel as $data)
                            <form method="post" action="/doBooking/{{$data->id}}">
                                {{-- @method('patch') --}}
                                @csrf
                                <div class="input-group mb-3 mt-4 input">
                                    <div class="row">
                                        <div class="col-3">
                                            <span class="input-group-text" style="background-color: transparent; border:none">
                                                <img src="{{asset('storage/assets/username1.png')}}" alt="username" class="inpimage">
                                            </span>
                                        </div>
                                        <div class="col-7">
                                            <input placeholder="Nama Lengkap" type="text" name="nama_lengkap" class="@error('nama_lengkap') is-invalid @enderror" value="{{ old('nama_lengkap') }}" required autocomplete="nama_lengkap">
                                            @error('nama_lengkap')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-2"></div>
                                    </div>
                                </div>
                                <div class="input-group mb-3 mt-4 input">
                                    <div class="row">
                                        <div class="col-3">
                                            <span class="input-group-text" style="background-color: transparent; border:none">
                                                <img src="{{asset('storage/assets/phone.png')}}" alt="phone" class="inpimage">
                                            </span>
                                        </div>
                                        <div class="col-7">
                                            <input placeholder="Phone" type="number" name="noTelp" class="@error('noTelp') is-invalid @enderror" value="{{ old('noTelp') }}" required autocomplete="noTelp">
                                            @error('noTelp')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-2"></div>
                                    </div>
                                </div>
                                <div class="input-group mb-3 mt-4 input">
                                    <div class="row">
                                        <div class="col-3">
                                            <span class="input-group-text" style="background-color: transparent; border:none">
                                                <img src=" {{asset('storage/assets/email.png')}}" alt="email" class="inpimage">
                                            </span>
                                        </div>
                                        <div class="col-7">
                                            <input id="email" placeholder="Email" type="email" class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                            
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-2"></div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <h4 style="margin-left: 3px">Check-in</h4>
                                        <div class="input-group mb-3 mt-1 input" style="max-width: 250px">
                                            <div class="row">
                                                <div class="col-12">
                                                    <input id="check_in" type="date" name="check_in" class="@error('check_in') is-invalid @enderror" value="{{ old('check_in') }}" required autocomplete="check_in">
                                                    @error('check_in')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="col-2"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <h4 style="margin-left: 3px">Check-out</h4>
                                        <div class="input-group mb-3 mt-1 input" style="max-width: 250px">
                                            <div class="row">
                                                <div class="col-12">
                                                    <input id="check_out" type="date" name="check_out" class="@error('check_out') is-invalid @enderror" value="{{ old('check_out') }}" required autocomplete="check_out">
                                                    @error('check_out')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="col-2"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-7">
                                        <h4 style="margin-left: 3px">Jumlah kamar</h4>
                                        <div class="input-group mb-3 mt-1 input" style="max-width: 250px">
                                            <input id="jumlah_kamar" type="number" name="jumlah_kamar" class="@error('jumlah_kamar') is-invalid @enderror" value="1" required autocomplete="jumlah_kamar">
                                        </div>
                                    </div>
                                    @foreach ($hotel as $item)
                                        <input type="hidden" name="" id="hargaHotel" value="{{$item->harga}}">
                                    @endforeach
                                    @error('jumlah_kamar')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <div class="col-md-5 mt-5" data-aos="fade-up" data-aos-anchor-placement="top-bottom">
                                        <div class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold">Total</div>
                                        <div class="p-4">
                                            <li class="d-flex justify-content-between py-3 border-bottom">
                                                <strong class="text-muted d-flex">Total harga : Rp &nbsp;
                                                <p id="total">0</p>
                                                <input type="hidden" name="total_harga" id="total_harga" value="0">
                                                </strong>
                                            </li>
                                        </div>
                                        <button type="submit" class="btn btn-dark rounded-pill py-2 btn-block" style="margin-left:20px">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-receipt" viewBox="0 0 16 16">
                                                <path d="M1.92.506a.5.5 0 0 1 .434.14L3 1.293l.646-.647a.5.5 0 0 1 .708 0L5 1.293l.646-.647a.5.5 0 0 1 .708 0L7 1.293l.646-.647a.5.5 0 0 1 .708 0L9 1.293l.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .801.13l.5 1A.5.5 0 0 1 15 2v12a.5.5 0 0 1-.053.224l-.5 1a.5.5 0 0 1-.8.13L13 14.707l-.646.647a.5.5 0 0 1-.708 0L11 14.707l-.646.647a.5.5 0 0 1-.708 0L9 14.707l-.646.647a.5.5 0 0 1-.708 0L7 14.707l-.646.647a.5.5 0 0 1-.708 0L5 14.707l-.646.647a.5.5 0 0 1-.708 0L3 14.707l-.646.647a.5.5 0 0 1-.801-.13l-.5-1A.5.5 0 0 1 1 14V2a.5.5 0 0 1 .053-.224l.5-1a.5.5 0 0 1 .367-.27zm.217 1.338L2 2.118v11.764l.137.274.51-.51a.5.5 0 0 1 .707 0l.646.647.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.509.509.137-.274V2.118l-.137-.274-.51.51a.5.5 0 0 1-.707 0L12 1.707l-.646.647a.5.5 0 0 1-.708 0L10 1.707l-.646.647a.5.5 0 0 1-.708 0L8 1.707l-.646.647a.5.5 0 0 1-.708 0L6 1.707l-.646.647a.5.5 0 0 1-.708 0L4 1.707l-.646.647a.5.5 0 0 1-.708 0l-.509-.51z"/>
                                                <path d="M3 4.5a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5zm8-6a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5z"/>
                                            </svg>
                                            Booking
                                        </button>
                                    </div>
                                </div>
                            </form>
                        @endforeach
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    <br>

</div>
<script>
    $(document).ready(function(){
        $("#check_in").on('change', function(e){
            e.preventDefault();
            var checkIn = $('#check_in').val();
            var checkOut = $('#check_out').val();
            var harga = $('#hargaHotel').val();
            var kamar = $('#jumlah_kamar').val();

            var check_in = new Date(checkIn);
            var check_out = new Date(checkOut);
            
            var milidetik1 = check_out.getTime();
            var milidetik2 = check_in.getTime();

            var selisihMili = milidetik1 - milidetik2;
            var selisihdetik = selisihMili/1000;
            var selisihmenit = selisihdetik/60;
            var selisihjam = selisihmenit/60;
            var selisihhari = selisihjam/24;
            var temp = selisihhari * harga;
            var total = temp * kamar;
            if(checkOut !== '' && total > 0) {
                var format = new Intl.NumberFormat("id-ID", { style: "currency", currency: "IDR" }).format(total);
                $('#total').text(format);
                $('#total_harga').val(total);
            } else {
                $('#total').text('0') ;
            }
        });
        $("#check_out").on('change', function(e){
            e.preventDefault();
            var checkIn = $('#check_in').val();
            var checkOut = $('#check_out').val();
            var harga = $('#hargaHotel').val();
            var kamar = $('#jumlah_kamar').val();

            var check_in = new Date(checkIn);
            var check_out = new Date(checkOut);
            
            var milidetik1 = check_out.getTime();
            var milidetik2 = check_in.getTime();

            var selisihMili = milidetik1 - milidetik2;
            var selisihdetik = selisihMili/1000;
            var selisihmenit = selisihdetik/60;
            var selisihjam = selisihmenit/60;
            var selisihhari = selisihjam/24;
            var temp = selisihhari * harga;
            var total = temp * kamar;
            if(checkIn !== '' && total > 0) {
                var format = new Intl.NumberFormat("id-ID", { style: "currency", currency: "IDR" }).format(total);
                $('#total').text(format) ;
                $('#total_harga').val(total);
            } else {
                $('#total').text('0') ;
            }
        });
        $("#jumlah_kamar").on('change', function(e){
            e.preventDefault();
            var checkIn = $('#check_in').val();
            var checkOut = $('#check_out').val();
            var harga = $('#hargaHotel').val();
            var kamar = $('#jumlah_kamar').val();

            var check_in = new Date(checkIn);
            var check_out = new Date(checkOut);
            
            var milidetik1 = check_out.getTime();
            var milidetik2 = check_in.getTime();

            var selisihMili = milidetik1 - milidetik2;
            var selisihdetik = selisihMili/1000;
            var selisihmenit = selisihdetik/60;
            var selisihjam = selisihmenit/60;
            var selisihhari = selisihjam/24;
            var temp = selisihhari * harga;
            var total = temp * kamar;
            if(checkIn !== '' && checkOut !== '' && total > 0) {
                var format = new Intl.NumberFormat("id-ID", { style: "currency", currency: "IDR" }).format(total);
                $('#total').text(format);
                $('#total_harga').val(total);
            } else {
                $('#total').text('0');
            }
        });
    });
</script>

@endsection
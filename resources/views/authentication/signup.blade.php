@extends('template/authTemplate')
@section('title', 'Sign Up')
@section('styles')
    <style>
        * {
            margin: 0;
            padding: 0;
        }
        html, body {
            height: 100%;
        }
        body {
            height:100%;
            background: #fc00ff;  /* fallback for old browsers */
            background: -webkit-linear-gradient(to right, #00dbde, #fc00ff);  /* Chrome 10-25, Safari 5.1-6 */
            background: linear-gradient(to right, #00dbde, #fc00ff); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
            background-repeat: no-repeat;
            background-size: cover;
            background-attachment: fixed
        }
        .signup {
            border-radius: 2px;
        }
        .logo {
            height: 200px;
            width: 100%;
            padding-bottom: 30px;
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
<div style="text-align: center;margin-top:70px">
    <div class="container" style="background-color: aliceblue;max-width:500px;padding:40px;border-radius:60px">

        <h2 style="text-align: center">Create account</h2>
        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
            @csrf

            <div class="input-group mb-3 mt-4 input">
                <div class="row">
                    <div class="col-3">
                        <span class="input-group-text" style="background-color: transparent; border:none">
                            <img src="storage/assets/email.png" alt="username" class="inpimage">
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
            <div class="input-group mb-3 mt-4 input">
                <div class="row">
                    <div class="col-3">
                        <span class="input-group-text" style="background-color: transparent; border:none">
                            <img src="storage/assets/username1.png" alt="username" class="inpimage">
                        </span>
                    </div>
                    <div class="col-7">
                        <input placeholder="First Name" type="text" name="firstname" class="@error('firstname') is-invalid @enderror" value="{{ old('firstname') }}" required autocomplete="firstname">
                        @error('firstname')
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
                            <img src="storage/assets/username1.png" alt="username" class="inpimage">
                        </span>
                    </div>
                    <div class="col-7">
                        <input placeholder="Last Name" type="text" name="lastname" class="@error('lastname') is-invalid @enderror" value="{{ old('lastname') }}" required autocomplete="lastname">
                        @error('lastname')
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
                            <img src="storage/assets/address.png" alt="username" class="inpimage">
                        </span>
                    </div>
                    <div class="col-7">
                        <input placeholder="Address" type="text" name="alamat" class="@error('alamat') is-invalid @enderror" value="{{ old('alamat') }}" required autocomplete="alamat">
                        @error('alamat')
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
                            <img src="storage/assets/birthdate.png" alt="username" class="inpimage">
                        </span>
                    </div>
                    <div class="col-7">
                        <input placeholder="Tanggal Lahir" type="date" name="tanggal_lahir" class="@error('tanggal') is-invalid @enderror" value="{{ old('tanggal') }}" required autocomplete="tanggal_lahir">
                        @error('tanggal_lahir')
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
                            <img src="storage/assets/gender.png" alt="username" class="inpimage">
                        </span>
                    </div>
                    <div class="col-7 offset-1">
                        {{-- <input placeholder="Jenis Kelamin" type="text" name="jenisKelamin"> --}}
                        <select aria-label="Default select example" name="jenisKelamin"
                            style="border: none;background-color:transparent;font-weight: bold;margin-left:8px"
                            class="form-select @error('jenisKelamin') is-invalid @enderror" value="{{ old('jenisKelamin') }}" required autocomplete="jenisKelamin">
                            <option selected disabled style="color:gray"><b>Gender</b></option>
                            <option value="Pria">Pria</option>
                            <option value="Wanita">Wanita</option>
                        </select>
                        @error('jenisKelamin')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-1"></div>
                </div>
            </div>
            <div class="input-group mb-3 mt-4 input">
                <span class="input-group-text bg-dark" id="basic-addon1" style="border-radius: 15px; color:white; border-top-right-radius: 0; border-bottom-right-radius: 0;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-card-image" viewBox="0 0 16 16">
                        <path d="M6.002 5.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
                        <path d="M1.5 2A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13zm13 1a.5.5 0 0 1 .5.5v6l-3.775-1.947a.5.5 0 0 0-.577.093l-3.71 3.71-2.66-1.772a.5.5 0 0 0-.63.062L1.002 12v.54A.505.505 0 0 1 1 12.5v-9a.5.5 0 0 1 .5-.5h13z"/>
                      </svg>
                </span>
                <input type="file" id="formFile" name="gambar" style="border-radius: 15px; border-top-left-radius: 0; border-bottom-left-radius: 0;"
                class="form-control">
                @error('gambar')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror  
            </div>
            <div class="input-group mb-3 mt-4 input">
                <div class="row">
                    <div class="col-3">
                        <span class="input-group-text" style="background-color: transparent; border:none">
                            <img src="storage/assets/phone.png" alt="phone" class="inpimage">
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
                            <img src="storage/assets/password1.png" alt="username" class="inpimage">
                        </span>
                    </div>
                    <div class="col-7">
                        <input placeholder="Password" id="password" type="password" class="@error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                        
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        
                    </div>
                    <div class="col-2">
                        <i class="bi bi-eye-fill"  id="togglePassword" style="margin-top: 14px"></i>
                    </div>
                </div>
            </div>

            <div class="input-group mb-3 mt-4 input">
                <div class="row">
                    <div class="col-3">
                        <span class="input-group-text" style="background-color: transparent; border:none">
                            <img src="storage/assets/password1.png" alt="username" class="inpimage">
                        </span>
                    </div>
                    <div class="col-7">
                        <input placeholder="Confirm Password" id="password-confirm" type="password" name="password_confirmation" required autocomplete="new-password"
                        class="@error('password_confirmation') is-invalid @enderror">
                        @error('password_confirmation')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-2">
                        <i class="bi bi-eye-fill"  id="toggleConfirmPassword" style="margin-top: 14px"></i>
                    </div>
                </div>
            </div>

            <div class="g-recaptcha" data-sitekey="6LeqfPUaAAAAAL1481S-n8t-9K1dyBUXs85SN8Fy"></div>
            @if(Session::has('g-recaptcha-response'))
                <p id="captcha" class="alert {{Session::get('alert-class', 'alert-info' )}}">
                    {{Session::get('g-recaptcha-response')}}
                </p>
            @endif 

      
            <br/>
            <div style="text-align: left">
                <button type="submit" class="btn btn-transparent">
                    <h1>
                        Create
                        <i class="bi bi-arrow-right-circle-fill" style="color: #0c45c0; margin-top:8px;margin-left:10px"></i>
                    </h1>
                </button>

            </div>
            <p>Sudah punya akun? yuk <a href="/Login">log in.</a></p>
           <div style="text-align: right">
                <a href="/" class="btn btn-transparent mt-2">
                    <h1>
                        Home
                        <i class="bi bi-arrow-left-circle-fill" style="color: #0c45c0; margin-top:8px;margin-left:10px"></i>
                    </h1>
                </a> 
            </div>
        </form>
    </div>
</div>


<script>
//Password
const togglePassword = document.querySelector('#togglePassword');
const password = document.querySelector('#password');
togglePassword.addEventListener('click', function (e) {
    // toggle the type attribute
    const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
    password.setAttribute('type', type);
    // toggle the eye slash icon
    this.classList.toggle('bi-eye-slash-fill');
});

//Confirm Password
const toggleConfirmPassword = document.querySelector('#toggleConfirmPassword');
const confirmPassword = document.querySelector('#password-confirm');
toggleConfirmPassword.addEventListener('click', function (e) {
    // toggle the type attribute
    const type = confirmPassword.getAttribute('type') === 'password' ? 'text' : 'password';
    confirmPassword.setAttribute('type', type);
    // toggle the eye slash icon
    this.classList.toggle('bi-eye-slash-fill');
});
</script>
@endsection
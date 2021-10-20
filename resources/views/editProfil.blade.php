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
    </style>
@section('body')
<div>
    <div class="container mt-5">
        <h3><strong>Edit Profile</strong></h3>
        @foreach ($user as $item)
            <form action="/doUserEdit" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{$id}}">
                <div class="row">
                    <div class="col-12 mt-5">
                        <div class="container">
                            <div class="row">
                                <label class="form-label text-muted"><strong>Foto</strong></label>
                                <div class="col-2 text-center">
                                    <div style="border: 2px solid rgb(231, 231, 231); border-radius:4px">
                                        <img src="{{asset('storage/assets/users/'.$item->foto)}}" alt="" style="max-width: 70px;">
                                    </div>
                                </div>
                                <div class="col-7">
                                    <input type="file" name="gambar" class="form-control" style="max-width: 400px">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mt-3">
                        <div class="container">
                            <div class="row">
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label class="form-label text-muted"><strong>First Name</strong></label>
                                        <input type="text" name="firstname" class="form-control form-control-lg 
                                            @error('firstname') is-invalid @enderror" value="{{$item->firstname}}" required autocomplete="firstname">
                                        @error('firstname')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mt-3">
                        <div class="container">
                            <div class="row">
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label class="form-label text-muted"><strong>Last Name</strong></label>
                                        <input type="text" name="lastname" class="form-control form-control-lg
                                            @error('lastname') is-invalid @enderror" value="{{$item->lastname}}" required autocomplete="lastname">
                                        @error('lastname')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="container">
                            <div class="row">
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label class="form-label text-muted"><strong>Email</strong></label>
                                        <input type="email" class="form-control form-control-lg" disabled style="max-width: 600px" value="{{$item->email}}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="container">
                            <div class="row">
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label class="form-label text-muted"><strong>Alamat</strong></label>
                                        <textarea type="text" name="alamat" class="form-control form-control-lg
                                            @error('alamat') is-invalid @enderror" style="max-width: 600px" required autocomplete="alamat">{{$item->alamat}}</textarea>
                                        @error('alamat')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="container">
                            <div class="row">
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label class="form-label text-muted"><strong>Tanggal Lahir</strong></label>
                                        <input type="date" name="tanggal_lahir" class="form-control form-control-lg
                                            @error('tanggal_lahir') is-invalid @enderror" value="{{$item->tanggal_lahir}}" required autocomplete="tanggal_lahir">
                                        @error('tanggal_lahir')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="container">
                            <div class="row">
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label class="form-label text-muted"><strong>Jenis Kelamin</strong></label>
                                        <select class="form-select" name="jenisKelamin" aria-label="Default select example"
                                        class="@error('jenisKelamin') is-invalid @enderror" required autocomplete="jenisKelamin">
                                            @if($item->jenisKelamin == "Pria")
                                                <option selected value="Pria">Pria</option>
                                                <option value="Wanita">Wanita</option>
                                            @else 
                                                <option selected value="Wanita">Wanita</option>
                                                <option value="Pria">Pria</option>
                                            @endif
                                        </select>
                                        @error('jenisKelamin')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <div class="mb-3">
                                    <label class="form-label text-muted"><strong>Phone</strong></label>
                                    <input type="number" name="noTelp" class="form-control form-control-lg
                                        @error('noTelp') is-invalid @enderror" value="{{$item->noTelp}}" required autocomplete="noTelp">
                                    @error('noTelp')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                    <div class="col-12">
                        <div class="container">
                            <div class="row">
                                <div class="col-12">
                                    <button type="submit" class="btn btn-success">Update Profile    
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-lg" viewBox="0 0 16 16">
                                            <path d="M13.485 1.431a1.473 1.473 0 0 1 2.104 2.062l-7.84 9.801a1.473 1.473 0 0 1-2.12.04L.431 8.138a1.473 1.473 0 0 1 2.084-2.083l4.111 4.112 6.82-8.69a.486.486 0 0 1 .04-.045z"/>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        @endforeach
    </div>
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
</div>
@endsection
<?php

namespace App\Http\Controllers;
use \App\Models\Hotel;
// use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class AllUserController extends Controller
{
    public function index() {
        $hotel = DB::table('hotel')->limit(3)->get();
        $bandung = DB::table('hotel')
                    ->where('kota', "Bandung")
                    ->count();
        $bandung_avg = DB::table('hotel')
                    ->where('kota', "Bandung")
                    ->avg('harga');
        $surabaya = DB::table('hotel')
                    ->where('kota', "Surabaya")
                    ->count();
        $surabaya_avg = DB::table('hotel')
        ->where('kota', "Surabaya")
        ->sum('harga');
                    
        if(!empty(Auth::user()->id)) {
            $jumlah = DB::table('booking')
                    ->where('id_user', Auth::user()->id)
                    ->count();
        } else {
            $jumlah = 0;
        }
        return view('index', [
            'hotel' => $hotel, 
            'bandung' => $bandung,
            'bandung_avg' => $bandung_avg,
            'surabaya' => $surabaya,
            'surabaya_avg' => $surabaya_avg,
            'jumlah' => $jumlah
            ]);
    }
    public function login() {
        return view('authentication.login');
    }
    public function signup() {
        return view('authentication.signup');
    }
    public function hotel() {
        $hotel = Hotel::all();
        $autocomplete = DB::table('hotel')
                        ->select('kota')
                        ->groupBy('kota')
                        ->get();
        if(!empty(Auth::user()->id)) {
            $jumlah = DB::table('booking')
                    ->where('id_user', Auth::user()->id)
                    ->count();
        } else {
            $jumlah = 0;
        }
        $bintang = 0;
        $hargaMin = 0;
        $hargaMax = DB::table('hotel')
            ->max('harga');
        return view('hotel', [
            'hotel' => $hotel, 
            'jumlah' => $jumlah, 
            'autocomplete' => $autocomplete,
            'kota' => 'kosong',
            'bintang' => $bintang,
            'hargaMin' => $hargaMin,
            'hargaMax' => $hargaMax
            ]);
    }
    public function hotelSearch(Request $request) {
        $autocomplete = DB::table('hotel')
                        ->select('kota')
                        ->groupBy('kota')
                        ->get();
        if(!empty(Auth::user()->id)) {
            $jumlah = DB::table('booking')
                    ->where('id_user', Auth::user()->id)
                    ->count();
        } else {
            $jumlah = 0;
        }

        if(!empty($request->bintang)){
            $bintang = $request->bintang;
            $default = '=';
        } else {
            $default = '>';
            $bintang = 0;
        }

        $min = '>';
        $max = '<=';
        if($request->harga_min > 0 && $request->harga_min < $request->harga_max) {
            $hargaMin = $request->harga_min;
        } else {
            $hargaMin = 0;
        }
        if ($request->harga_max > 0 && $request->harga_max > $request->harga_min) {
            $hargaMax = $request->harga_max;
        }else {
            $hargaMax = DB::table('hotel')
            ->max('harga');
        }
        if($request->kota !== null && $request->kota !== 'kosong') {
            $hotel = DB::table('hotel')
            ->whereBetween('harga', [$hargaMin, $hargaMax])
            ->where('kota', $request->kota)
            ->where('bintang', $default, $bintang)
            ->get();
            return view('hotel', [
                'hotel' => $hotel, 
                'jumlah' => $jumlah, 
                'autocomplete' => $autocomplete,
                'kota' => $request->kota,
                'bintang' => $bintang,
                'hargaMin' => $hargaMin,
                'hargaMax' => $hargaMax
                ]);
        } else {
            $hotel = DB::table('hotel')
            ->whereBetween('harga', [$hargaMin, $hargaMax])
            ->where('bintang', $default, $bintang)
            ->get();
            return view('hotel', [
                'hotel' => $hotel, 
                'jumlah' => $jumlah, 
                'autocomplete' => $autocomplete,
                'kota' => 'kosong',
                'bintang' => $bintang,
                'hargaMin' => $hargaMin,
                'hargaMax' => $hargaMax
                ]);
        }


    }
    public function hotelDetails($data) {
        $check = DB::table('hotel')
                ->where('nama_hotel', $data)
                ->count();
        if(!empty(Auth::user()->id)) {
            $jumlah = DB::table('booking')
                    ->where('id_user', Auth::user()->id)
                    ->count();
        } else {
            $jumlah = 0;
        }
        if($check !== 0) {
            $hotel = DB::table('hotel')
                    ->where('nama_hotel', $data)
                    ->get();
            
            $lainnya = DB::table('hotel')->limit(3)->get();
            foreach ($hotel as $data) {
                $fasilitas = Str::of($data->fasilitas)->explode(',');
            }
            return view('hotelDetails', [
                'hotel' => $hotel, 
                'fasilitas' => $fasilitas,
                'lainnya' => $lainnya,
                'jumlah' => $jumlah
                ]);
        }else {
            echo ("Error") ;
        }
    }
    public function aboutUS() {
        if(!empty(Auth::user()->id)) {
            $jumlah = DB::table('booking')
                    ->where('id_user', Auth::user()->id)
                    ->count();
                  
            return view('aboutUS', ['jumlah' => $jumlah]);
        } else {
            return view('aboutUS');
        }
    }
    public function contactUS() {
        if(!empty(Auth::user()->id)) {
            $jumlah = DB::table('booking')
                    ->where('id_user', Auth::user()->id)
                    ->count();
            return view('contactUS', ['jumlah' => $jumlah]);
        } else {
            return view('contactUS');
        }
    }
}



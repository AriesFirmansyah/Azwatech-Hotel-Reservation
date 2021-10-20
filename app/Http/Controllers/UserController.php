<?php

namespace App\Http\Controllers;
use \App\Models\User;
use \App\Models\Hotel;
use \App\Models\Booking;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function bookingForm($data) {
        $jumlah = DB::table('booking')
                ->where('id_user', Auth::user()->id)
                ->count();
        $hotel = DB::table('hotel')
                ->where('nama_hotel', $data)
                ->get();
        return view('bookingForm', [
            'jumlah' => $jumlah,
            'hotel' => $hotel
        ]);
    }
    public function booking(Request $request, Hotel $data) {
        $jumlah = DB::table('booking')
                ->where('id_user', Auth::user()->id)
                ->count();
        $request->validate([
            'nama_lengkap' => ['required', 'string', 'max:255'],
            'noTelp' => ['required', 'numeric', 'digits_between:11,13'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'check_in' => ['required', 'date'],
            'check_out' => ['required', 'date'],
        ]);
        if($request->check_in < $request->check_out) {
            if($request->jumlah_kamar < $data->stok_kamar) {
                 DB::table('hotel')
                ->where('id', $data->id)
                ->decrement('stok_kamar');
                
                Booking::create([
                    'nama_lengkap' => $request->nama_lengkap,
                    'email' => $request->email,
                    'no_telp' => $request->noTelp,
                    'jumlah_kamar' => $request->jumlah_kamar,
                    'tgl_check_in' => $request->check_in,
                    'tgl_check_out' => $request->check_out,
                    'nama_hotel' => $data->nama_hotel,
                    'kota_hotel' => $data->kota,
                    'negara_hotel' => $data->negara,
                    'gambar_hotel' => $data->gambar,
                    'harga' => $request->total_harga,
                    'bintang_hotel' => $data->bintang,
                    'id_user' => Auth::user()->id,
                    'fasilitas' => $data->fasilitas,
                    ]);
                return redirect('/hotel')->with('status', 'Hotel '.$data->nama_hotel.' berhasil di booking!');
            } else {
                return redirect('/hotel')->with('status', 'Maaf, Jumlah kamar melebihi stok kamar!');
            }
            // $awal = date_create($request->check_in);
            // $akhir = date_create($request->check_out);
            // $tes = date_diff($awal, $akhir);
            // return $tes->days;
        } else {
            if($request->jumlah_kamar <= $data->stok_kamar) {
                return redirect('/hotel')->with('status', 'Tanggal check-in tidak boleh lebih besar dari check-out!');
            }else {
                return redirect('/hotel')->with('status', 'Maaf, Jumlah kamar melebihi stok kamar!');
            }
        }
    }
    public function transaction() {
        $jumlah = DB::table('booking')
                ->where('id_user', Auth::user()->id)
                ->count();
        
        if($jumlah !== 0) {
            $transaction = DB::table('booking')
                        ->where('id_user', Auth::user()->id)
                        ->get();
            return view('transaction', ['transaction' => $transaction, 'jumlah' => $jumlah]);
        } else {
            return view('transaction', ['transaction' => 'kosong', 'jumlah' => $jumlah]);
        }
    }
    public function invoice($data) {
        $jumlah = DB::table('booking')
                ->where('id_user', Auth::user()->id)
                ->count();
        
        if($jumlah !== 0) {
            $invoice = DB::table('booking')
                        ->where('nama_hotel', $data)
                        ->get();
            foreach ($invoice as $data) {
                $fasilitas = Str::of($data->fasilitas)->explode(',');
            }
            return view('invoice', ['invoice' => $invoice, 'fasilitas' => $fasilitas, 'jumlah' => $jumlah]);
        } else {
            return redirect('/')->with('status', 'Invoice tidak ditemukan!');
        }
    }

    public function userEdit($id){
        $jumlah = DB::table('booking')
                ->where('id_user', Auth::user()->id)
                ->count();
        
        $user = DB::table('users')
                ->where('id', Auth::user()->id)
                ->get();
        if(Auth::user()->id == $id) {
            return view('editProfil', ['jumlah' => $jumlah, 'user' => $user, 'id' => $id]);
        } else {
            return redirect('/')->with('status', 'User tidak diketahui!');
        }

    }
    public function doUserEdit(Request $request) {
        $jumlah = DB::table('booking')
                ->where('id_user', Auth::user()->id)
                ->count();
        
        if(Auth::user()->id == $request->id) {
            if(empty($request->gambar)) {
                $request->validate([
                    'firstname' => ['required', 'string', 'max:255'],
                    'lastname' => ['required', 'string', 'max:255'],
                    'alamat' => ['required', 'string', 'max:255'],
                    'tanggal_lahir' => ['required', 'date'],
                    'jenisKelamin' => ['required', 'string', 'max:255'],
                    'noTelp' => ['required', 'numeric', 'digits_between:11,13'],
                ]);
    
                User::where('id', Auth::user()->id )
                    ->update([
                        'firstname' => $request->firstname,
                        'lastname' => $request->lastname,
                        'alamat' => $request->alamat,
                        'tanggal_lahir' => $request->tanggal_lahir,
                        'jenisKelamin' => $request->jenisKelamin,
                        'noTelp' => $request->noTelp,
                ]);
    
                return redirect('/EditProfile/'.Auth::user()->id)->with('status', 'Data akun berhasil di update!');
            } else {
                $gambar_baru = $request->file('gambar')->getClientOriginalName();
                $request->file('gambar')->storeAs('/public/assets/users', $gambar_baru);
    
                $request->validate([
                    'firstname' => ['required', 'string', 'max:255'],
                    'lastname' => ['required', 'string', 'max:255'],
                    'alamat' => ['required', 'string', 'max:255'],
                    'tanggal_lahir' => ['required', 'date'],
                    'jenisKelamin' => ['required', 'string', 'max:255'],
                    'noTelp' => ['required', 'numeric', 'digits_between:11,13'],
                ]);
    
                User::where('id', Auth::user()->id )
                    ->update([
                        'firstname' => $request->firstname,
                        'lastname' => $request->lastname,
                        'alamat' => $request->alamat,
                        'tanggal_lahir' => $request->tanggal_lahir,
                        'jenisKelamin' => $request->jenisKelamin,
                        'foto' => $gambar_baru,
                        'noTelp' => $request->noTelp,
                ]);
                return redirect('/EditProfile/'.Auth::user()->id)->with('status', 'Data akun berhasil di update!');
            }
        } else {
            return redirect('/')->with('status', 'User tidak diketahui!');
        }
    }

}

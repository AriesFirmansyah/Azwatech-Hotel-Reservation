<?php

namespace App\Http\Controllers;
use \App\Models\User;
use \App\Models\Booking;
use \App\Models\Hotel;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $transaction = DB::table('booking')->count();
        $revenue = DB::table('booking')->sum('harga');
        $users = DB::table('users')->count();
        $revenue = number_format($revenue, 2,",", ".");
        return view('admin.admin', ['transaction' => $transaction, 'revenue' => $revenue, 'users' => $users]);
    }
    public function transaction() {
        $jumlah = DB::table('booking')
                ->count();
        if($jumlah !== 0) {
            $invoice = Booking::all();
            return view('admin.transaction', ['invoice' => $invoice, 'kondisi' => 'ada']);
        } else {
            return view('admin.transaction', ['kondisi' => 'kosong']);
        }
    }
    public function hotel() {
        $hotels = Hotel::all();
        return view('admin.hotel', ['hotels' => $hotels]);
    }
    public function updateHotel(Request $request, Hotel $id)
    {
        if(empty($request->gambar)) {
            $request->validate([
                'nama_hotel' => ['required', 'string', 'max:255'],
                'harga' => ['required', 'integer'],
                'kota' => ['required', 'string', 'max:255'],
                'negara' => ['required', 'string', 'max:255'],
                'bintang' => ['required', 'integer'],
                'stok' => ['required', 'integer'],
                'fasilitas' => ['required', 'string', 'max:255'],
            ]);

            Hotel::where('id', $id->id)
                ->update([
                    'nama_hotel' => $request->nama_hotel,
                    'harga' => $request->harga,
                    'kota' => $request->kota,
                    'negara' => $request->negara,
                    'bintang' => $request->bintang,
                    'stok_kamar' => $request->stok,
                    'fasilitas' => $request->fasilitas,
            ]);

            return redirect('/adminHotel')->with('status', 'Data hotel berhasil di update!');
        } else {
            $gambar_baru = $request->file('gambar')->getClientOriginalName();
            $request->file('gambar')->storeAs('/public/assets/hotel', $gambar_baru);

            $request->validate([
                'nama_hotel' => ['required', 'string', 'max:255'],
                'harga' => ['required', 'integer'],
                'kota' => ['required', 'string', 'max:255'],
                'negara' => ['required', 'string', 'max:255'],
                'gambar' => ['required'],
                'bintang' => ['required', 'integer'],
                'stok' => ['required', 'integer'],
                'fasilitas' => ['required', 'string', 'max:255'],
            ]);

            Hotel::where('id', $id->id)
                ->update([
                    'nama_hotel' => $request->nama_hotel,
                    'harga' => $request->harga,
                    'kota' => $request->kota,
                    'gambar' => $gambar_baru,
                    'negara' => $request->negara,
                    'bintang' => $request->bintang,
                    'stok_kamar' => $request->stok,
                    'fasilitas' => $request->fasilitas,
            ]);
            return redirect('/adminHotel')->with('status', 'Data hotel berhasil di update!');
        }
    }
    public function addHotel() {
        return view('admin.addHotel');
    }
    public function doAddHotel(Request $request) {
        $request->validate([
            'nama_hotel' => ['required', 'string', 'max:255'],
            'harga' => ['required', 'integer'],
            'kota' => ['required', 'string', 'max:255'],
            'negara' => ['required', 'string', 'max:255'],
            'gambar' => ['required'],
            'bintang' => ['required', 'numeric', 'max:5'],
            'stok_kamar' => ['required', 'integer'],
            'fasilitas' => ['required', 'string', 'max:255'],
        ]);
        $gambar = $request->file('gambar')->getClientOriginalName();
        $addData = new Hotel();
        $addData->nama_hotel = $request->nama_hotel;
        $addData->harga = $request->harga;
        $addData->kota = $request->kota;
        $addData->gambar = $gambar;
        $addData->negara = $request->negara;
        $addData->bintang = $request->bintang;
        $addData->stok_kamar = $request->stok_kamar;
        $addData->fasilitas = $request->fasilitas;
        $request->file('gambar')->storeAs('/public/assets/hotel', $gambar);
        $addData->save();
        return redirect('/adminHotel')->with('status', "Data hotel berhasil ditambahkan!");
    }
    public function listUser()
    {
        $users = User::all();
        return view('admin.listUser', ['users' => $users]);
    }
    public function destroy(Hotel $data)
    {
        Hotel::destroy($data->id);
        return redirect('/adminHotel')->with('status', "Hotel berhasil dihapus!");
    }
    
}

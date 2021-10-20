<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    protected $table = 'booking';
    protected $fillable = ['nama_lengkap', 'email', 'no_telp', 'jumlah_kamar', 'tgl_check_in', 'tgl_check_out', 'nama_hotel', 'kota_hotel', 'negara_hotel', 'gambar_hotel', 'harga', 'bintang_hotel', 'id_user', 'fasilitas'];
}

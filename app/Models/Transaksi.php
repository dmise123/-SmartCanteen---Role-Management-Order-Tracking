<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $table = "transaksi";
    protected $primaryKey = "id_transaksi";

    

    protected $fillable = [
        'total_harga',
        'deskripsi',
        'mahasiswa_id_users',
        'toko_id_users', 
        'status_pesanan_id_status',
    ];

    public function Mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class);
    }

    public function Toko()
    {
        return $this->hasMany(Transaksi::class, 'toko_id_users', 'users_id_users');
    }

    public function DetailTransaksi()
    {
        return $this->hasMany(DetailTransaksi::class);
    }

    public function RekamBayar()
    {
        return $this->hasOne(RekamBayar::class, 'transaksi_id_transaksi', 'id_transaksi')->onDelete('cascade');
    }

    public function StatusPesanan()
    {
        return $this->belongsTo(StatusPesanan::class);
    }

    public function StatusTransaksi()
    {
        return $this->belongsTo(StatusTransaksi::class);
    }
}

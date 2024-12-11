<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailTransaksi extends Model
{
    use HasFactory;

    protected $table = "detail_transaksi";
    protected $primaryKey = ['transaksi_id_transaksi', 'menu_id_menu'];

    protected $fillable = [
        'kuantitas',
        'sub_total_harga',
        'transaksi_id_transaksi',
        'menu_id_menu'
    ];
    public $incrementing = false;

    protected $casts = [
        'menu_id_menu' => 'integer',
    ];

    public function Transaksi()
    {
        return $this->belongsTo(Transaksi::class, "transaksi_id_transaksi");
    }

    public function Menu()
    {
        return $this->belongsTo(Menu::class, "menu_id_menu");
    }
}

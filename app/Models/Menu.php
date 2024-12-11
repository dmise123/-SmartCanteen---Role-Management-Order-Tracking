<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Menu extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'menu';
    protected $primaryKey = 'id_menu';


    protected $fillable = [
        'nama_menu',
        'path_foto',
        'harga',
        'toko_users_id_users'

    ];


    public function Toko()
    {
        return $this->belongsTo(Toko::class, 'toko_id');
    }

    public function DetailTransaksi()
    {
        return $this->hasMany(DetailTransaksi::class);
    }
}

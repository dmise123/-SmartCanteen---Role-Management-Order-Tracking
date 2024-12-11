<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Toko extends Model
{
    use HasFactory, SoftDeletes;

    
    protected $table = "toko";
    protected $primaryKey = "users_id_users";
    protected $fillable = [
        'nama_toko',
        'deskripsi_toko',
        'path_foto',
        'is_open',
        'kantin_id_kantin',
        'users_id_users',
    ];

    public function Users()
    {
        return $this->belongsTo(User::class, 'users_id_users', 'id_users');
    }

    public function Kantin()
    {
        return $this->belongsTo(Kantin::class, 'kantin_id_kantin', 'id_kantin');
    }
    public function Menu()
    {
        return $this->hasMany(Menu::class);
    }
    public function Transaksi()
    {
        return $this->hasMany(Transaksi::class, 'toko_id_users');
    }
}

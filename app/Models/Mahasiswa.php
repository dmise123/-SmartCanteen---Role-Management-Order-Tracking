<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;
    protected $table = "mahasiswa";
    protected $primaryKey = "users_id_users";

    public function Users()
    {
        return $this->belongto(Users::class);
    }
    public function transaksi()
    {
        return $this->hasMany(Transaksi::class, "mahasiswa_id_users");
    }
}

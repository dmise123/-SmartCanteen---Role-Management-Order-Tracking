<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kantin extends Model
{
    use HasFactory;
    
    protected $table = "kantin";
    protected $primaryKey = "id_kantin";
    protected $fillable = [
        'nama_kantin',  
    ];

    public function Toko()
    {
        return $this->hasMany(Toko::class, 'kantin_id_kantin', 'id_kantin');
    }
}

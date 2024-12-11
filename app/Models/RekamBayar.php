<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RekamBayar extends Model
{
    use HasFactory;

    public function Transaksi()
    {
        return $this->belongsTo(Transaksi::class);
    }
}

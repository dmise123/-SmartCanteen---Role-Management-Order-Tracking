<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Users extends Model
{
    use HasFactory;

    protected $table = "users";
    protected $primaryKey = "id_users";
    protected $fillable = [
        'nama',
        'email',
        'password',
        'picture',
        'status_user_id_status',
    ];


    public function StatusUser()
    {
        return $this->belongsTo(StatusUser::class);
    }

    public function Mahasiswa()
    {
        return $this->hasone(Mahasiswa::class);
    }

    public function Admin()
    {
        return $this->hasone(Admin::class);
    }

    public function Toko()
    {
        return $this->hasone(Toko::class);
    }
}

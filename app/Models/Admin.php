<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;
    protected $primaryKey = "users_id_users";
    protected $table = "admin";



    public function Users()
    {
        return $this->belongsTo(Users::class);
    }
}

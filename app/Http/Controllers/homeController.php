<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Toko;
use Illuminate\Http\Request;

class homeController extends Controller
{

    public function mahasiswa()
    {
        return view("mahasiswa.home");
    }
    public function kantin()
    {
        $toko = Toko::find(auth()->user()->id_users);
        $menus = $toko->Menu;

        return view("general.pesan", compact(['toko', 'menus']));
    }
}

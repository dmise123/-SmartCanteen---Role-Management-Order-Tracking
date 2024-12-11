<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Toko;
use App\Models\Users;
use Illuminate\Http\Request;

class RiwayatController extends Controller
{
    //

    function index(Request $request)
    {
        $user = Users::find(auth()->user()->id_users);
        if ($user->status_user_id_status == 1) {
            $mahasiswa = Mahasiswa::find($user->id_users);
            $listTransaksi = $mahasiswa->transaksi;
            

            $riwayatPesanan = [];
            foreach ($listTransaksi as $transaksi) {
                $toko = Toko::find($transaksi->toko_id_users);
                $riwayatPesanan[] = ["toko" => $toko, "transaksi" => $transaksi];
            }

            return view('general.pesanan', compact('riwayatPesanan'));
        }
        if ($user->status_user_id_status == 2) {
        }
        if ($user->status_user_id_status == 3) {
        }
    }
}

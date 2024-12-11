<?php

namespace App\Http\Controllers;

use App\Models\Kantin;
use App\Models\Mahasiswa;
use App\Models\Toko;
use App\Models\Users;
use App\Models\StatusPesanan;
use App\Models\Transaksi;

use Illuminate\Http\Request;


class AdminController extends Controller
{
    public function index(Request $request, $section = 'mahasiswa')
    {
        // Validate section input
        if (!in_array($section, ['mahasiswa', 'admin', 'toko', 'kantin', 'transaksi'])) {
            $section = 'mahasiswa';
        }

        // Get filter parameter from request, default to 'active'
        $filter = $request->get('filter', 'active');

        if ($section === 'mahasiswa') {
            // Filter users based on 'active' or 'restore'
            if ($filter === 'restore') {
                $users = Users::whereNotNull('deleted_at')->where('status_user_id_status', 1)->get();
            } else {
                $users = Users::whereNull('deleted_at')->where('status_user_id_status', 1)->get();
            }
            return view('admin.home', compact('users', 'section', 'filter'));
        }

        if ($section === 'admin') {
            // Filter admins based on 'active' or 'restore'
            if ($filter === 'restore') {
                $users = Users::whereNotNull('deleted_at')->where('status_user_id_status', 3)->get();
            } else {
                $users = Users::whereNull('deleted_at')->where('status_user_id_status', 3)->get();
            }
            return view('admin.home', compact('users', 'section', 'filter'));
        }

        if ($section === 'toko') {
            if ($filter === 'restore') {
                $tokos = Toko::whereNotNull('deleted_at')->get(); // Deleted tokos
            } else {
                $tokos = Toko::whereNull('deleted_at')->get(); // Active tokos
            }
            return view('admin.home', compact('tokos', 'section', 'filter'));
        }

        if ($section === 'transaksi') {
            $listTransaksi = Transaksi::all();

            if ($filter === 'restore') {
                $listTransaksi = Transaksi::whereNotNull('deleted_at')->get();
            } else {
                $listTransaksi = Transaksi::whereNull('deleted_at')->get();
            }

            $riwayatPesanan = [];
            foreach ($listTransaksi as $transaksi) {
                $toko = Toko::find($transaksi->toko_id_users);
                $users = Users::find($transaksi->mahasiswa_id_users);
                $mahasiswa = Mahasiswa::find($transaksi->mahasiswa_id_users);
                $status_transaksi = StatusPesanan::find($transaksi->status_pesanan_id_status);
                $riwayatPesanan[] = ["toko" => $toko, "transaksi" => $transaksi, 'pembeli' => $users, 'status' => $status_transaksi, 'mahasiswa' => $mahasiswa];
            }


            return view('admin.home', compact('riwayatPesanan', 'section', 'filter'));
        }

        if ($filter === 'restore') {
            $kantins = Kantin::whereNotNull('deleted_at')->get(); // Deleted kantins
        } else {
            $kantins = Kantin::whereNull('deleted_at')->get(); // Active kantins
        }

        return view('admin.home', compact('kantins', 'section', 'filter'));
    }


    public function search(Request $request, $section = 'kantin')
    {
        $searchTerm = $request->input('search');
        if ($section === 'toko') {
            $tokos = Toko::where('nama_toko', 'LIKE', '%' . $searchTerm . '%')->get();
            return view('admin.home', compact('tokos', 'section'));
        }

        $kantins = Kantin::where('nama_kantin', 'LIKE', '%' . $searchTerm . '%')->get();
        return view('admin.home', compact('kantins', 'section', 'filter'));
    }
}

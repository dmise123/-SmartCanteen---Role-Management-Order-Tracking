<?php

namespace App\Http\Controllers;

use App\Models\Kantin;
use App\Models\Mahasiswa;
use App\Models\Toko;
use App\Models\Users;
use App\Models\StatusPesanan;
use App\Models\Transaksi;
use Carbon\Carbon;
use Illuminate\Http\Request;



class AdminTransaksiController extends Controller
{
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


    public function createTransaksi()
    {

        $mahasiswa = Users::whereHas('StatusUser', function ($query) {
            $query->where('nama_status', 'mahasiswa');
        })->get();

        $toko = Users::whereHas('StatusUser', function ($query) {
            $query->where('nama_status', 'toko');
        })->get();


        $statuses = StatusPesanan::all();

        return view('admin.transaksi.create', compact('mahasiswa', 'toko', 'statuses'));
    }

    public function storeTransaksi(Request $request)
    {

        $validatedData = $request->validate([
            'total_harga' => 'required|numeric',
            'deskripsi' => 'nullable|string|max:500',
            'mahasiswa_id_users' => 'required|exists:users,id_users',
            'toko_id_users' => 'required|exists:users,id_users',
            'status_pesanan_id_status' => 'required|exists:status_pesanan,id_status_pesanan',
        ]);

        Transaksi::create($validatedData);


        return redirect()->route('admin.index', ['section' => 'transaksi'])->with('success', 'Transaksi berhasil dibuat.');
    }

    public function editTransaksi($id)
    {
        $transaksi = Transaksi::findOrFail($id);


        $mahasiswa = Users::whereHas('StatusUser', function ($query) {
            $query->where('nama_status', 'mahasiswa');
        })->get();

        $toko = Users::whereHas('StatusUser', function ($query) {
            $query->where('nama_status', 'toko');
        })->get();

        $statuses = StatusPesanan::all();

        return view('admin.transaksi.edit', compact('transaksi', 'mahasiswa', 'toko', 'statuses'));
    }

    public function updateTransaksi(Request $request, $id)
    {

        $transaksi = Transaksi::findOrFail($id);

        $validatedData = $request->validate([
            'total_harga' => 'required|numeric',
            'deskripsi' => 'nullable|string|max:500',
            'mahasiswa_id_users' => 'required|exists:users,id_users',
            'toko_id_users' => 'required|exists:users,id_users',
            'status_pesanan_id_status' => 'required|exists:status_pesanan,id_status_pesanan',
        ]);

        $transaksi->update($validatedData);


        return redirect()->route('admin.index', ['section' => 'transaksi'])->with('success', 'Transaksi berhasil diperbarui.');
    }

    public function deleteTransaksi($id)
    {
        $transaksi = Transaksi::findOrFail($id);
        $transaksi->deleted_at = Carbon::now();
        $transaksi->save();

        return redirect()->route('admin.index', ['section' => 'transaksi'])->with('success', 'Transaksi berhasil dihapus.');
    }

    public function restoreTransaksi($id)
    {
        $transaksi = Transaksi::findOrFail($id);
        $transaksi->deleted_at = null;
        $transaksi->save();

        return redirect()->route('admin.index', ['section' => 'transaksi'])->with('success', 'Transaksi berhasil direstore.');
    }
}

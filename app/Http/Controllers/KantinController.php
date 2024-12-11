<?php

namespace App\Http\Controllers;

use App\Models\DetailTransaksi;
use App\Models\Kantin;
use App\Models\Menu;
use App\Models\Toko;
use App\Models\Transaksi;
use App\Models\User;
use App\Models\Users;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class KantinController extends Controller
{
    function index(Request $request, $kantin_id)
    {
        $kantin = Kantin::find($kantin_id);
        $listToko = $kantin->Toko;
        return view('mahasiswa.toko', compact(['listToko', 'kantin']));
    }

    function pesanan(Request $request)
    {
        $toko = Toko::find(auth()->user()->id_users);
        $listPesanan = $toko->Transaksi;

        $orders = [];
        foreach ($listPesanan as $pesanan) {
            $pemesan = Users::find($pesanan->mahasiswa_id_users);
            $orders[] = ["pemesan" => $pemesan, "notaTransaksi" => $pesanan];
        }

        return view('general.pesanan', compact('orders'));
    }
    function bukaTutup()
    {

        $toko = Toko::find(auth()->user()->id_users);
        $toko->is_open = !$toko->is_open;
        $toko->save();

        return response()->json(['success' => true, 'buka' => $toko->is_open]);
    }


    function tersedia($menu_id)
    {

        $menu = Menu::find($menu_id);
        $menu->status_tersedia = !$menu->status_tersedia;
        $menu->save();

        return response()->json(['success' => true, 'isAvailable' => $menu->status_tersedia]);
    }

    function buatMenu(Request $request)
    {

        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'price' => 'required|numeric|min:1',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);


        $menuPicture = $request->file('photo');
        $menuPictureName = Str::random(12) . '.' . $menuPicture->getClientOriginalExtension();
        $menuPicturePath = $menuPicture->move(public_path('assets/foods'), $menuPictureName);
        $menuPictureUrl = 'assets/foods/' . $menuPictureName;
        $menu = Menu::create([
            'nama_menu' => $validatedData['name'],
            'harga' => $validatedData['price'],
            'toko_users_id_users' => auth()->user()->id_users,
            'path_foto' => $menuPictureUrl,
        ]);




        return redirect()->route('homeCanteen');
    }
    function ubahMenu(Request $request, $menu_id)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'price' => 'required|numeric|min:1',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $menu = Menu::find($menu_id);

        $menuPicture = $request->file('photo');
        $menuPictureName = Str::random(12) . '.' . $menuPicture->getClientOriginalExtension();
        $menuPicturePath = $menuPicture->move(public_path('assets/foods'), $menuPictureName);
        $menuPictureUrl = 'assets/foods/' . $menuPictureName;

        $menu->nama_menu            = $validatedData['name'];
        $menu->harga                = $validatedData['price'];
        $menu->path_foto            = $menuPictureUrl;

        $menu->save();

        return redirect()->route('homeCanteen');
    }

    function deleteMenu($menu_id){
        $menu = Menu::findOrFail($menu_id);

        $menu->deleted_at = Carbon::now();
        $menu->save();

        return redirect()->route('homeCanteen');
    }
}

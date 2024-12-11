<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class ApiController extends Controller
{

    function detail($transaksi_id)
    {
        $transaksi = Transaksi::find($transaksi_id);
        $detailTransaksi = $transaksi->DetailTransaksi;
        $detailMenu = [];
        foreach ($detailTransaksi as $detail) {
            $menu = Menu::find($detail->menu_id_menu);
            $detailMenu[] = ["nama_menu" => $menu->nama_menu, "kuantitas" => $detail->kuantitas, "sub_total_harga" => $detail->sub_total_harga];
        }

        $data = ["data" =>  $detailMenu, "total_harga" => $transaksi->total_harga];


        return json_encode($data);
    }
}

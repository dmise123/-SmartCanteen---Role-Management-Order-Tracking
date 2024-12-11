<?php

namespace App\Http\Controllers;

use App\Models\DetailTransaksi;
use App\Models\Menu;
use App\Models\Toko;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

use function Laravel\Prompts\error;

class MenuController extends Controller
{


    function index($toko_id)
    {
        $toko = Toko::find($toko_id);
        $menus = $toko->Menu;
        return view('general.pesan', compact('menus'));
    }

    function nota()
    {
        $orders = session('orders', []);
        $transaction = session('transaction', []);

        $ordersData = [];
        $snapData = [];
        foreach ($orders as $order) {
            $menu = Menu::find($order['menu_id_menu']);

            $snapData[] = [
                "id" => $menu->id_menu ?? 'unknown',
                "name" => $menu->nama_menu ?? 'Unknown Menu',
                "price" => (float) ($menu->harga ?? 0),
                "quantity" => (int) ($order['kuantitas'] ?? 0),
                "subtotal" => (float) ($order['sub_total_harga'] ?? 0),
            ];

            $ordersData[] = ["id_menu" => $menu->id_menu, "nama_menu" => $menu->nama_menu, "path_foto" => $menu->path_foto, "sub_total_harga" => $order['sub_total_harga'], "kuantitas" => $order['kuantitas'], "toko" => $menu->toko_users_id_users,];
        }

        // dd($snapData);
        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = config('midtrans.server_key');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;

        $params = array(
            'transaction_details' => array(
                'order_id' => rand(),
                'gross_amount' => (int) $transaction['total_harga'],
            ),
            'item_details' => $snapData,
            'customer_details' => array(
                'name' =>  auth()->user()->nama,
                'email' => auth()->user()->email,
            ),
        );

        $snap = \Midtrans\Snap::getSnapToken($params);
        $ordersDataJSON = json_encode($ordersData, JSON_UNESCAPED_SLASHES);
        $token = [
            "token1" => $this->generateHmac($ordersDataJSON),
            "token2" => $this->generateHmac(auth()->user()->id_users),
            "token3" => $this->generateHmac($ordersData[0]['toko']),
            "token4" => $this->generateHmac($transaction['total_harga'])
        ];


        return view('mahasiswa.nota', compact(['ordersData', 'ordersDataJSON', 'transaction', 'snap', 'token']));
    }

    function pay(Request $request)
    {
        $orders = $request->input('orders');
        $totalHargaForm = $request->input('totalHarga');

        $totalHarga = 0;
        foreach ($orders as $menuId => $quantity) {
            $menu = Menu::find($menuId);
            $totalHarga += $menu->harga * $quantity;
        }

        if ($totalHarga != $totalHargaForm) {
            return error("Price Total Not Matched");
        }

        $transaksi = ([
            'mahasiswa_id_users' => auth()->user()->id_users,
            'status_pesanan_id_status' => 2,
            'total_harga' => $totalHarga,
        ]);

        $detailTransaksi = [];
        foreach ($orders as $menuId => $quantity) {
            $menu = Menu::find($menuId);
            $DetailTransaksi = ([
                'menu_id_menu' => $menuId,
                'kuantitas' => $quantity,
                'sub_total_harga' => $menu->harga * $quantity,
            ]);
            $detailTransaksi[] = $DetailTransaksi;
        }


        session(['orders' => $detailTransaksi, 'transaction' => $transaksi]);
        return response()->json(["message" => "success"]);
    }

    private function generateHmac($data)
    {
        $secretKey = env('HMAC_SECRET_KEY');
        $hmac = hash_hmac('sha256', $data, $secretKey);

        return $hmac;
    }
}

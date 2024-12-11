<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DetailTransaksiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $detailTransaksi = [
            [
                'kuantitas' => 1,
                'sub_total_harga' => 22000,
                'transaksi_id_transaksi' => 1,
                'menu_id_menu' => 8,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
            ],
            [
                'kuantitas' => 1,
                'sub_total_harga' => 16000,
                'transaksi_id_transaksi' => 2,
                'menu_id_menu' => 4,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
            ],
            [
                'kuantitas' => 2,
                'sub_total_harga' => 15000,
                'transaksi_id_transaksi' => 3,
                'menu_id_menu' => 18,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
            ],
        ];

        DB::table('detail_transaksi')->insert($detailTransaksi);
    }
}

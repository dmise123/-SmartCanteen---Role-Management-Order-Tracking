<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class TransaksiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $transaksi = [
            [
                'id_transaksi' => 1,
                'total_harga' => 22000,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
                'mahasiswa_id_users' => 1,
                'toko_id_users' => 23,
                'status_pesanan_id_status' => 3
            ],
            [
                'id_transaksi' => 2,
                'total_harga' => 16000,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
                'mahasiswa_id_users' => 1,
                'toko_id_users' => 5,
                'status_pesanan_id_status' => 2
            ],
            [
                'id_transaksi' => 3,
                'total_harga' => 15000,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
                'mahasiswa_id_users' => 2,
                'toko_id_users' => 18,
                'status_pesanan_id_status' => 4
            ],
        ];
        DB::table('transaksi')->insert($transaksi);
    }
}

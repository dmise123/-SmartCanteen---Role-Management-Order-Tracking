<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class RekamBayarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $rekamBayar = [
            [
                'waktu_bayar' => Carbon::now(),
                'nominal' => 20000,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
                'transaksi_id_transaksi' => 1
            ],
            [
                'waktu_bayar' => Carbon::now(),
                'nominal' => 25000,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
                'transaksi_id_transaksi' => 2
            ],
            [
                'waktu_bayar' => Carbon::now(),
                'nominal' => 10000,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
                'transaksi_id_transaksi' => 3
            ],
        ];
        DB::table('rekam_bayar')->insert($rekamBayar);
    }
}

<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\DetailTransaksi;
use App\Models\Mahasiswa;
use App\Models\Transaksi;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(StatusUserSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(KantinSeeder::class);
        $this->call(AdminSeeder::class);
        $this->call(MahasiswaSeeder::class);
        $this->call(TokoSeeder::class);
        $this->call(MenuSeeder::class);
        $this->call(StatusPesananSeeder::class);
        $this->call(TransaksiSeeder::class);
        $this->call(RekamBayarSeeder::class);
        $this->call(DetailTransaksiSeeder::class);


    }
}

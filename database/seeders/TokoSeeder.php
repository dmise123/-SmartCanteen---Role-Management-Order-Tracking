<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class TokoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    function run(): void
    {
        $toko = [
            //kantin P
            [
                'is_open' => 1,
                'kantin_id_kantin' => 3,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
                'users_id_users' => 5,
                'nama_toko' => 'Carnival',
                'deskripsi_toko' => 'Toko makanan yang menyediakan berbagai macam makanan',
                'path_foto' => '/assets/kantin/toko/kantinP1.jpg'

            ],
            [
                'is_open' => 1,
                'kantin_id_kantin' => 3,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
                'users_id_users' => 6,
                'nama_toko' => 'Japan Food',
                'deskripsi_toko' => 'Makanan Jepang',
                'path_foto' => '/assets/kantin/toko/kantinP2.jpg'


            ],
            [
                'is_open' => 1,
                'kantin_id_kantin' => 3,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
                'users_id_users' => 7,
                'nama_toko' => 'Depot kita',
                'deskripsi_toko' => 'Toko makanan enak',
                'path_foto' => '/assets/kantin/toko/kantinP3.png'


            ],
            [
                'is_open' => 1,
                'kantin_id_kantin' => 3,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
                'users_id_users' => 8,
                'nama_toko' => 'Depot Mapan',
                'deskripsi_toko' => 'Toko makanan enak dan murah',
                'path_foto' => '/assets/kantin/toko/kantinP4.png'


            ],
            [
                'is_open' => 1,
                'kantin_id_kantin' => 3,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
                'users_id_users' => 9,
                'nama_toko' => 'Kue Nyonya',
                'deskripsi_toko' => 'Toko kue nyonya yang enak',
                'path_foto' => '/assets/kantin/toko/kantinP5.png'


            ],
            [
                'is_open' => 1,
                'kantin_id_kantin' => 3,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
                'users_id_users' => 10,
                'nama_toko' => 'Soto Ayam Jago',
                'deskripsi_toko' => 'Toko soto ayam yang enak',
                'path_foto' => '/assets/kantin/toko/kantinP6.png'


            ],
            [
                'is_open' => 1,
                'kantin_id_kantin' => 3,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
                'users_id_users' => 11,
                'nama_toko' => 'NDOKEE',
                'deskripsi_toko' => 'NDOKEE enak',
                'path_foto' => '/assets/kantin/toko/kantinP7.jpg'
            ],

            //kantin Q
            [
                'is_open' => 1,
                'kantin_id_kantin' => 4,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
                'users_id_users' => 12,
                'nama_toko' => 'REMAJA',
                'deskripsi_toko' => 'Mie Ayam, Bakso & Siomay',
                'path_foto' => '/assets/kantin/toko/kantinQ1.jpg'
            ],
            [
                'is_open' => 1,
                'kantin_id_kantin' => 4,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
                'users_id_users' => 13,
                'nama_toko' => 'KOPTE',
                'deskripsi_toko' => 'Kopi dan Teh',
                'path_foto' => '/assets/kantin/toko/kantinQ2.jpg'
            ],
            [
                'is_open' => 1,
                'kantin_id_kantin' => 4,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
                'users_id_users' => 14,
                'nama_toko' => 'KEDAI KITA',
                'deskripsi_toko' => 'Ayam Bakar & Ayam Goreng',
                'path_foto' => '/assets/kantin/toko/kantinQ3.jpg'
            ],
            [
                'is_open' => 1,
                'kantin_id_kantin' => 4,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
                'users_id_users' => 15,
                'nama_toko' => 'KxK Resto',
                'deskripsi_toko' => 'Eat Better Do Better',
                'path_foto' => '/assets/kantin/toko/kantinQ4.png'
            ],
            [
                'is_open' => 1,
                'kantin_id_kantin' => 4,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
                'users_id_users' => 16,
                'nama_toko' => 'Excelso',
                'deskripsi_toko' => 'Excelso Coffee & Snack',
                'path_foto' => '/assets/kantin/toko/kantinQ5.jpg'
            ],

            //kantin T
            [
                'is_open' => 1,
                'kantin_id_kantin' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
                'users_id_users' => 17,
                'nama_toko' => 'Dcrepes',
                'deskripsi_toko' => 'Dreal crepes, Dreal joy', 
                'path_foto' => '/assets/kantin/toko/kantinT1.jpg'
            ],
            [
                'is_open' => 1,
                'kantin_id_kantin' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
                'users_id_users' => 18,
                'nama_toko' => 'Bakso Sapi',
                'deskripsi_toko' => 'Bakso sapi enak',
                'path_foto' => '/assets/kantin/toko/kantinT2.jpg'
            ],
            [
                'is_open' => 1,
                'kantin_id_kantin' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
                'users_id_users' => 19,
                'nama_toko' => 'Markit ~ Top',
                'deskripsi_toko' => 'Nasi Goreng & Mie Goreng',
                'path_foto' => '/assets/kantin/toko/kantinT3.png'
            ],
            [
                'is_open' => 1,
                'kantin_id_kantin' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
                'users_id_users' => 20,
                'nama_toko' => 'Berkat catering', 
                'deskripsi_toko' => 'Berkat catering jualan makanan enak',
                'path_foto' => '/assets/kantin/toko/kantinT4.png'
            ],

            //kantin W
            [
                'is_open' => 1,
                'kantin_id_kantin' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
                'users_id_users' => 21,
                'nama_toko' => 'Kedai Hong', 
                'deskripsi_toko' => 'Citarasa Bangsawan Harga Merakyat',
                'path_foto' => '/assets/kantin/toko/kantinW1.jpg'
            ],
            [
                'is_open' => 1,
                'kantin_id_kantin' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
                'users_id_users' => 22,
                'nama_toko' => 'Mie 55', 
                'deskripsi_toko' => 'Mie 55 enak',
                'path_foto' => '/assets/kantin/toko/kantinW2.jpg'
            ],
            [
                'is_open' => 1,
                'kantin_id_kantin' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
                'users_id_users' => 23,
                'nama_toko' => 'Ayam Bakar Pinarak', 
                'deskripsi_toko' => 'Ayam Bakar Pinarak enak',
                'path_foto' => '/assets/kantin/toko/kantinW3.jpg'
            ],
            [
                'is_open' => 1,
                'kantin_id_kantin' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
                'users_id_users' => 24,
                'nama_toko' => 'POK POK', 
                'deskripsi_toko' => 'My Crispy Snack',
                'path_foto' => '/assets/kantin/toko/kantinW4.png'
            ],
            [
                'is_open' => 1,
                'kantin_id_kantin' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
                'users_id_users' => 25,
                'nama_toko' => 'Chatime', 
                'deskripsi_toko' => 'Good Tea Good Time',
                'path_foto' => '/assets/kantin/toko/kantinW5.jpg'
            ],
            [
                'is_open' => 1,
                'kantin_id_kantin' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
                'users_id_users' => 26,
                'nama_toko' => 'Starbucks', 
                'deskripsi_toko' => 'Starbucks Coffee',
                'path_foto' => '/assets/kantin/toko/kantinW6.png'
            ],


        ];
        DB::table('toko')->insert($toko);
    }
}

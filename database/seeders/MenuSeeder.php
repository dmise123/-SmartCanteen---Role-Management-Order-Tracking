<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $menus = [

            //carnival
            [
                'id_menu' => 1,
                'nama_menu' => 'Fried Meatball',
                'path_foto' => '/assets/foods/carnival1.jpg',
                'harga' => 14000,
                'status_tersedia' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
                'toko_users_id_users' => 5
            ],
            [
                'id_menu' => 2,
                'nama_menu' => 'Fried Chicken',
                'path_foto' => '/assets/foods/carnival7.jpg',
                'harga' => 20000,
                'status_tersedia' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
                'toko_users_id_users' => 5
            ],
            [
                'id_menu' => 3,
                'nama_menu' => 'Curly Fries',
                'path_foto' => '/assets/foods/carnival4.jpg',
                'harga' => 16000,
                'status_tersedia' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
                'toko_users_id_users' => 5
            ],
            [
                'id_menu' => 4,
                'nama_menu' => 'Fried Mushroom',
                'path_foto' => '/assets/foods/carnival5.jpg',
                'harga' => 16000,
                'status_tersedia' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
                'toko_users_id_users' => 5
            ],
            [
                'id_menu' => 5,
                'nama_menu' => 'French Fries',
                'path_foto' => '/assets/foods/carnival6.jpeg',
                'harga' => 16000,
                'status_tersedia' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
                'toko_users_id_users' => 5
            ],
            [
                'id_menu' => 6,
                'nama_menu' => 'Fried Tofu',
                'path_foto' => '/assets/foods/carnival8.jpg',
                'harga' => 16000,
                'status_tersedia' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
                'toko_users_id_users' => 5
            ],

            //ayam pinarak
            [
                'id_menu' => 7,
                'nama_menu' => 'Ayam Bakar',
                'path_foto' => '/assets/foods/ayampinarak1.jpg',
                'harga' => 22000,
                'status_tersedia' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
                'toko_users_id_users' => 23
            ],
            [
                'id_menu' => 8,
                'nama_menu' => 'Ayam Kremes',
                'path_foto' => '/assets/foods/ayampinarak2.jpeg',
                'harga' => 22000,
                'status_tersedia' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
                'toko_users_id_users' => 23
            ],
            [
                'id_menu' => 9,
                'nama_menu' => 'Ayam Goreng Tepung',
                'path_foto' => '/assets/foods/ayampinarak3.jpg',
                'harga' => 20000,
                'status_tersedia' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
                'toko_users_id_users' => 23
            ],
            [
                'id_menu' => 10,
                'nama_menu' => 'Karaage',
                'path_foto' => '/assets/foods/ayampinarak4.jpg',
                'harga' => 20000,
                'status_tersedia' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
                'toko_users_id_users' => 23
            ],
            [
                'id_menu' => 11,
                'nama_menu' => 'Tahu & Tempe Goreng',
                'path_foto' => '/assets/foods/ayampinarak5.jpg',
                'harga' => 12000,
                'status_tersedia' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
                'toko_users_id_users' => 23
            ],

            //Bakso Sapi
            [
                'id_menu' => 18,
                'nama_menu' => 'Bakso Goreng',
                'path_foto' => '/assets/foods/BaksoIkan.jpg',
                'harga' => 15000,
                'status_tersedia' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
                'toko_users_id_users' => 18
            ],
            [
                'id_menu' => 19,
                'nama_menu' => 'Bakso Pedas',
                'path_foto' => '/assets/foods/baksosapiasli1.jpg',
                'harga' => 17000,
                'status_tersedia' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
                'toko_users_id_users' => 18
            ],
            [
                'id_menu' => 20,
                'nama_menu' => 'Bakso Kuah',
                'path_foto' => '/assets/foods/baksosapiasli2.jpg',
                'harga' => 15000,
                'status_tersedia' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
                'toko_users_id_users' => 18
            ],
            [
                'id_menu' => 21,
                'nama_menu' => 'Bakso Halus',
                'path_foto' => '/assets/foods/baksosapiasli3.jpg',
                'harga' => 15000,
                'status_tersedia' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
                'toko_users_id_users' => 18
            ],
            [
                'id_menu' => 22,
                'nama_menu' => 'Bakso Kasar',
                'path_foto' => '/assets/foods/baksosapiasli4.jpg',
                'harga' => 20000,
                'status_tersedia' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
                'toko_users_id_users' => 18
            ],
            
            //remaja
            [
                'id_menu' => 23,
                'nama_menu' => 'Bakso Telur',
                'path_foto' => '/assets/foods/baksosapiasli5.jpg',
                'harga' => 18000,
                'status_tersedia' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
                'toko_users_id_users' => 12
            ],
            [
                'id_menu' => 24,
                'nama_menu' => 'Es Teh Manis',
                'path_foto' => '/assets/foods/baksosapiasli6.jpg',
                'harga' => 5000,
                'status_tersedia' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
                'toko_users_id_users' => 12
            ],
            [
                'id_menu' => 25,
                'nama_menu' => 'Es Jeruk',
                'path_foto' => '/assets/foods/baksosapiasli7.jpg',
                'harga' => 7000,
                'status_tersedia' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
                'toko_users_id_users' => 12
            ],

            //berkat Katering (9)
            [
                'id_menu' => 26,
                'nama_menu' => 'Nasi Kuning',
                'path_foto' => '/assets/foods/berkatkatering1.jpg',
                'harga' => 5000,
                'status_tersedia' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
                'toko_users_id_users' => 20
            ],
            [
                'id_menu' => 27,
                'nama_menu' => 'Nasi Uduk',
                'path_foto' => '/assets/foods/berkatkatering2.jpg',
                'harga' => 5000,
                'status_tersedia' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
                'toko_users_id_users' => 20
            ],
            [
                'id_menu' => 28,
                'nama_menu' => 'Nasi Krengsengan',
                'path_foto' => '/assets/foods/berkatkatering3.jpg',
                'harga' => 20000,
                'status_tersedia' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
                'toko_users_id_users' => 20
            ],
            [
                'id_menu' => 29,
                'nama_menu' => 'Nasi Rawon',
                'path_foto' => '/assets/foods/berkatkatering4.jpg',
                'harga' => 20000,
                'status_tersedia' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
                'toko_users_id_users' => 20
            ],
            [
                'id_menu' => 30,
                'nama_menu' => 'Sop Merah',
                'path_foto' => '/assets/foods/berkatkatering5.jpg',
                'harga' => 18000,
                'status_tersedia' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
                'toko_users_id_users' => 20
            ],
            [
                'id_menu' => 31,
                'nama_menu' => 'Nasi Pecel',
                'path_foto' => '/assets/foods/berkatkatering6.jpeg',
                'harga' => 16000,
                'status_tersedia' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
                'toko_users_id_users' => 20
            ],
            [
                'id_menu' => 32,
                'nama_menu' => 'Nasi Ayam Goreng',
                'path_foto' => '/assets/foods/berkatkatering7.jpg',
                'harga' => 18000,
                'status_tersedia' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
                'toko_users_id_users' => 20
            ],
            [
                'id_menu' => 33,
                'nama_menu' => 'nasi timbel empal',
                'path_foto' => '/assets/foods/berkatkatering8.jpg',
                'harga' => 20000,
                'status_tersedia' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
                'toko_users_id_users' => 20
            ],
            [
                'id_menu' => 34,
                'nama_menu' => 'pangsit mie',
                'path_foto' => '/assets/foods/berkatkatering9.jpg',
                'harga' => 18000,
                'status_tersedia' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
                'toko_users_id_users' => 20
            ],
            
            //chatime (4)
            [
                'id_menu' => 35,
                'nama_menu' => 'Chatime Milk Tea',
                'path_foto' => '/assets/foods/chattime1.jpg',
                'harga' => 25000,
                'status_tersedia' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
                'toko_users_id_users' => 25
            ],
            [
                'id_menu' => 36,
                'nama_menu' => 'Chatime Pearl Milk Tea',
                'path_foto' => '/assets/foods/chattime2.jpg',
                'harga' => 30000,
                'status_tersedia' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
                'toko_users_id_users' => 25
            ],
            [
                'id_menu' => 37,
                'nama_menu' => 'Chatime Mango Green Tea With Pearl',
                'path_foto' => '/assets/foods/chattime3.jpg',
                'harga' => 45000,
                'status_tersedia' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
                'toko_users_id_users' => 25
            ],
            [
                'id_menu' => 38,
                'nama_menu' => 'Chatime Hazelnut Chocolate Milk Tea',
                'path_foto' => '/assets/foods/chattime9.jpg',
                'harga' => 55000,
                'status_tersedia' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
                'toko_users_id_users' => 25
            ],

            //dcrepes (4)
            [
                'id_menu' => 39,
                'nama_menu' => 'Dcrepes Beef Burger',
                'path_foto' => '/assets/foods/dcrepes1.png',
                'harga' => 20000,
                'status_tersedia' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
                'toko_users_id_users' => 17
            ],
            [
                'id_menu' => 40,
                'nama_menu' => 'Dcrepes Pepperoni Pizza',
                'path_foto' => '/assets/foods/dcrepes2.png',
                'harga' => 22000,
                'status_tersedia' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
                'toko_users_id_users' => 17
            ],
            [
                'id_menu' => 41,
                'nama_menu' => 'Dcrepes Chili Dog',
                'path_foto' => '/assets/foods/dcrepes3.png',
                'harga' => 21000,
                'status_tersedia' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
                'toko_users_id_users' => 17
            ],
            [
                'id_menu' => 42,
                'nama_menu' => 'Dcrepes Crispy Chicken BBQ',
                'path_foto' => '/assets/foods/dcrepes4.png',
                'harga' => 25000,
                'status_tersedia' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
                'toko_users_id_users' => 17
            ],

            //depot kita (5) 
            [
                'id_menu' => 43,
                'nama_menu' => 'Ayam Goreng',
                'path_foto' => '/assets/foods/depotkita1.jpg',
                'harga' => 25000,
                'status_tersedia' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
                'toko_users_id_users' => 7
            ],
            [
                'id_menu' => 44,
                'nama_menu' => 'Fuyunghai',
                'path_foto' => '/assets/foods/depotkita2.jpg',
                'harga' => 15000,
                'status_tersedia' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
                'toko_users_id_users' => 7
            ],
            [
                'id_menu' => 45,
                'nama_menu' => 'Fuyunhghai Spesial',
                'path_foto' => '/assets/foods/depotkita3.jpg',
                'harga' => 18000,
                'status_tersedia' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
                'toko_users_id_users' => 7
            ],
            [
                'id_menu' => 46,
                'nama_menu' => 'Nasi Campur',
                'path_foto' => '/assets/foods/depotkita4.jpg',
                'harga' => 23000,
                'status_tersedia' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
                'toko_users_id_users' => 7
            ],
            [
                'id_menu' => 47,
                'nama_menu' => 'Ayam Geprek',
                'path_foto' => '/assets/foods/depotkita5.jpg',
                'harga' => 17000,
                'status_tersedia' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
                'toko_users_id_users' => 7
            ],

            //depot mapan (5)
            [
                'id_menu' => 48,
                'nama_menu' => 'Nasi Goreng',
                'path_foto' => '/assets/foods/depotmapan1.jpg',
                'harga' => 20000,
                'status_tersedia' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
                'toko_users_id_users' => 8
            ],
            [
                'id_menu' => 49,
                'nama_menu' => 'Nasi Goreng krengsengan',
                'path_foto' => '/assets/foods/depotmapan2.jpg',
                'harga' => 20000,
                'status_tersedia' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
                'toko_users_id_users' => 8
            ],
            [
                'id_menu' => 50,
                'nama_menu' => 'Nasi ayam koloke',
                'path_foto' => '/assets/foods/depotmapan3.jpg',
                'harga' => 25000,
                'status_tersedia' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
                'toko_users_id_users' => 8
            ],
            [
                'id_menu' => 51,
                'nama_menu' => 'Nasi capcay',
                'path_foto' => '/assets/foods/depotmapan4.jpg',
                'harga' => 20000,
                'status_tersedia' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
                'toko_users_id_users' => 8
            ],
            [
                'id_menu' => 52,
                'nama_menu' => 'Es Teh Manis',
                'path_foto' => '/assets/foods/depotmapan5.jpg',
                'harga' => 5000,
                'status_tersedia' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
                'toko_users_id_users' => 8
            ],

            // depot mie 55
            [
                'id_menu' => 53,
                'nama_menu' => 'Mie Bakso',
                'path_foto' => '/assets/foods/depotmie552.jpg',
                'harga' => 15000,
                'status_tersedia' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
                'toko_users_id_users' =>22
            ],
            [
                'id_menu' => 54,
                'nama_menu' => 'Mie goreng',
                'path_foto' => '/assets/foods/depotmie553.jpeg',
                'harga' => 16000,
                'status_tersedia' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
                'toko_users_id_users' =>22
            ],
            [
                'id_menu' => 55,
                'nama_menu' => 'bakmi goreng',
                'path_foto' => '/assets/foods/depotmie554.jpg',
                'harga' => 20000,
                'status_tersedia' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
                'toko_users_id_users' =>22
            ],
            [
                'id_menu' => 56,
                'nama_menu' => 'sate ayam',
                'path_foto' => '/assets/foods/depotmie559.jpg',
                'harga' => 23000,
                'status_tersedia' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
                'toko_users_id_users' =>22
            ],

            // excelso (4)
            [
                'id_menu' => 57,
                'nama_menu' => 'Es teh manis',
                'path_foto' => '/assets/foods/excelso1.jpg',
                'harga' => 12000,
                'status_tersedia' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
                'toko_users_id_users' =>16
            ],
            [
                'id_menu' => 58,
                'nama_menu' => 'Es tarik',
                'path_foto' => '/assets/foods/excelso8.png',
                'harga' => 12000,
                'status_tersedia' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
                'toko_users_id_users' =>16
            ],
            [
                'id_menu' => 59,
                'nama_menu' => 'Es tawar',
                'path_foto' => '/assets/foods/excelso10.jpg',
                'harga' => 12000,
                'status_tersedia' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
                'toko_users_id_users' =>16
            ],
            [
                'id_menu' => 60,
                'nama_menu' => 'Oreo Milkshake',
                'path_foto' => '/assets/foods/excelso1.jpg',
                'harga' => 50000,
                'status_tersedia' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
                'toko_users_id_users' =>16
            ],

            //japanese food (3)
            [
                'id_menu' => 61,
                'nama_menu' => 'Yakimeshi',
                'path_foto' => '/assets/foods/japanesefood2.jpg',
                'harga' => 24000,
                'status_tersedia' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
                'toko_users_id_users' =>6
            ],
            [
                'id_menu' => 62,
                'nama_menu' => 'Ramen',
                'path_foto' => '/assets/foods/japanesefood9.jpg',
                'harga' => 22000,
                'status_tersedia' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
                'toko_users_id_users' =>6
            ],
            [
                'id_menu' => 63,
                'nama_menu' => 'Sushi',
                'path_foto' => '/assets/foods/japanesefood8.jpg',
                'harga' => 18000,
                'status_tersedia' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
                'toko_users_id_users' =>6
            ],

            // kedai Hong (4)
            [
                'id_menu' => 64,
                'nama_menu' => 'nasi ayam kremes',
                'path_foto' => '/assets/foods/kedaihong1.jpg',
                'harga' => 20000,
                'status_tersedia' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
                'toko_users_id_users' =>21
            ],
            [
                'id_menu' => 65,
                'nama_menu' => 'nasi ayam bakar',
                'path_foto' => '/assets/foods/kedaihong2.jpg',
                'harga' => 22000,
                'status_tersedia' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
                'toko_users_id_users' =>21
            ],
            [
                'id_menu' => 66,
                'nama_menu' => 'nasi ayam sambal',
                'path_foto' => '/assets/foods/kedaihong3.jpg',
                'harga' => 22000,
                'status_tersedia' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
                'toko_users_id_users' =>21
            ],
            [
                'id_menu' => 67,
                'nama_menu' => 'nasi ayam penyet',
                'path_foto' => '/assets/foods/kedaihong4.jpg',
                'harga' => 23000,
                'status_tersedia' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
                'toko_users_id_users' =>21
            ],
            [
                'id_menu' => 68,
                'nama_menu' => 'es teh manis',
                'path_foto' => '/assets/foods/kedaihong7.jpg',
                'harga' => 5000,
                'status_tersedia' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
                'toko_users_id_users' =>21
            ],

            //kopte (5)

            [
                'id_menu' => 69,
                'nama_menu' => 'kopi tarik kopte',
                'path_foto' => '/assets/foods/kopte1.png',
                'harga' => 15000,
                'status_tersedia' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
                'toko_users_id_users' =>13
            ],
            [
                'id_menu' => 70,
                'nama_menu' => 'teh tarik cincau',
                'path_foto' => '/assets/foods/kopte2.png',
                'harga' => 17000,
                'status_tersedia' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
                'toko_users_id_users' =>13
            ],
            [
                'id_menu' => 71,
                'nama_menu' => 'teh tarik kopte',
                'path_foto' => '/assets/foods/kopte3.png',
                'harga' => 15000,
                'status_tersedia' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
                'toko_users_id_users' =>13
            ],
            [
                'id_menu' => 72,
                'nama_menu' => 'coklat tarik',
                'path_foto' => '/assets/foods/kopte4.png',
                'harga' => 15000,
                'status_tersedia' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
                'toko_users_id_users' =>13
            ],
            [
                'id_menu' => 73,
                'nama_menu' => 'Teh Jeruk Nipis',
                'path_foto' => '/assets/foods/kopte5.png',
                'harga' => 15000,
                'status_tersedia' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
                'toko_users_id_users' =>13
            ],

            //kue nyonya (3)
            [
                'id_menu' => 74,
                'nama_menu' => 'lemper',
                'path_foto' => '/assets/foods/kuenyonya1.jpg',
                'harga' => 15000,
                'status_tersedia' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
                'toko_users_id_users' =>9
            ],
            [
                'id_menu' => 75,
                'nama_menu' => 'kue kura kura',
                'path_foto' => '/assets/foods/kuenyonya2.jpg',
                'harga' => 20000,
                'status_tersedia' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
                'toko_users_id_users' =>9
            ],
            [
                'id_menu' => 76,
                'nama_menu' => 'kue ambon',
                'path_foto' => '/assets/foods/kuenyonya3.jpg',
                'harga' => 17000,
                'status_tersedia' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
                'toko_users_id_users' =>9
            ],

            //kxk (4)
            [
                'id_menu' => 77,
                'nama_menu' => 'Chicken Eggstra',
                'path_foto' => '/assets/foods/kxkresto1.png',
                'harga' => 20000,
                'status_tersedia' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
                'toko_users_id_users' =>15
            ],
            [
                'id_menu' => 78,
                'nama_menu' => 'Tenderloin Eggstra',
                'path_foto' => '/assets/foods/kxkresto2.png',
                'harga' => 28000,
                'status_tersedia' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
                'toko_users_id_users' =>15
            ],
            [
                'id_menu' => 79,
                'nama_menu' => 'Beef Slice',
                'path_foto' => '/assets/foods/kxkresto3.png',
                'harga' => 25000,
                'status_tersedia' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
                'toko_users_id_users' =>15
            ],
            [
                'id_menu' => 80,
                'nama_menu' => 'Kulit crispy',
                'path_foto' => '/assets/foods/kxkresto4.png',
                'harga' => 18000,
                'status_tersedia' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
                'toko_users_id_users' =>15
            ],

            //markittop (4)
            [
                'id_menu' => 81,
                'nama_menu' => 'nasi goreng merah',
                'path_foto' => '/assets/foods/markittop1.jpeg',
                'harga' => 18000,
                'status_tersedia' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
                'toko_users_id_users' =>19
            ],
            [
                'id_menu' => 82,
                'nama_menu' => 'nasi goreng putih',
                'path_foto' => '/assets/foods/markittop2.jpg',
                'harga' => 18000,
                'status_tersedia' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
                'toko_users_id_users' =>19
            ],
            [
                'id_menu' => 83,
                'nama_menu' => 'nasi goreng sosis',
                'path_foto' => '/assets/foods/markittop3.jpg',
                'harga' => 20000,
                'status_tersedia' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
                'toko_users_id_users' =>19
            ],
            [
                'id_menu' => 84,
                'nama_menu' => 'nasi cumi hitam',
                'path_foto' => '/assets/foods/markittop4.jpg',
                'harga' => 25000,
                'status_tersedia' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
                'toko_users_id_users' =>19
            ],

            //remaja (3)
            [
                'id_menu' => 85,
                'nama_menu' => 'mie kuah',
                'path_foto' => '/assets/foods/mieremaja1.png',
                'harga' => 20000,
                'status_tersedia' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
                'toko_users_id_users' =>12
            ],
            [
                'id_menu' => 86,
                'nama_menu' => 'Pangsit mie',
                'path_foto' => '/assets/foods/mieremaja2.png',
                'harga' => 22000,
                'status_tersedia' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
                'toko_users_id_users' =>12
            ],
            [
                'id_menu' => 87,
                'nama_menu' => 'Bihun Goreng',
                'path_foto' => '/assets/foods/mieremaja3.jpeg',
                'harga' => 20000,
                'status_tersedia' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
                'toko_users_id_users' =>12
            ],

            //ndokee (3)
            [
                'id_menu' => 88,
                'nama_menu' => 'Nasi Goreng',
                'path_foto' => '/assets/foods/ndokee1.jpeg',
                'harga' => 20000,
                'status_tersedia' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
                'toko_users_id_users' =>11
            ],
            [
                'id_menu' => 89,
                'nama_menu' => 'Nasi ayam koloke',
                'path_foto' => '/assets/foods/ndokee2.jpg',
                'harga' => 25000,
                'status_tersedia' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
                'toko_users_id_users' =>11
            ],
            [
                'id_menu' => 90,
                'nama_menu' => 'Nasi ayam kungpao',
                'path_foto' => '/assets/foods/ndokee3.jpg',
                'harga' => 22000,
                'status_tersedia' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
                'toko_users_id_users' =>11
            ],

            //pokpok (3)
            [
                'id_menu' => 91,
                'nama_menu' => 'ayam pokpok',
                'path_foto' => '/assets/foods/pokpok1.jpg',
                'harga' => 22000,
                'status_tersedia' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
                'toko_users_id_users' =>24
            ],
            [
                'id_menu' => 92,
                'nama_menu' => 'kulit ayam pokpok',
                'path_foto' => '/assets/foods/pokpok2.jpg',
                'harga' => 20000,
                'status_tersedia' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
                'toko_users_id_users' =>24
            ],
            [
                'id_menu' => 93,
                'nama_menu' => 'ayam goreng tepung',
                'path_foto' => '/assets/foods/pokpok3.jpg',
                'harga' => 26000,
                'status_tersedia' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
                'toko_users_id_users' =>24
            ],
            [
                'id_menu' => 94,
                'nama_menu' => 'kentang goreng',
                'path_foto' => '/assets/foods/pokpok5.jpg',
                'harga' => 23000,
                'status_tersedia' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
                'toko_users_id_users' =>24
            ],
            [
                'id_menu' => 95,
                'nama_menu' => 'cumi goreng',
                'path_foto' => '/assets/foods/pokpok4.jpg',
                'harga' => 28000,
                'status_tersedia' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
                'toko_users_id_users' =>24
            ],

            // soto ayam (4)
            [
                'id_menu' => 96,
                'nama_menu' => 'soto ayam spesial',
                'path_foto' => '/assets/foods/sotoayamjago1.jpg',
                'harga' => 22000,
                'status_tersedia' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
                'toko_users_id_users' =>10
            ],
            [
                'id_menu' => 97,
                'nama_menu' => 'soto ayam',
                'path_foto' => '/assets/foods/sotoayamjago2.jpg',
                'harga' => 22000,
                'status_tersedia' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
                'toko_users_id_users' =>10
            ],
            [
                'id_menu' => 98,
                'nama_menu' => 'soto ayam tanpa telur',
                'path_foto' => '/assets/foods/sotoayamjago3.jpeg',
                'harga' => 18000,
                'status_tersedia' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
                'toko_users_id_users' =>10
            ],
            [
                'id_menu' => 99,
                'nama_menu' => 'nasi putih',
                'path_foto' => '/assets/foods/sotoayamjago4.jpg',
                'harga' => 5000,
                'status_tersedia' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
                'toko_users_id_users' =>10
            ],
            [
                'id_menu' => 100,
                'nama_menu' => 'lontong',
                'path_foto' => '/assets/foods/sotoayamjago4.jpg',
                'harga' => 6000,
                'status_tersedia' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
                'toko_users_id_users' =>10
            ],

            // starbucks (4)
            [
                'id_menu' => 101,
                'nama_menu' => 'Caramel Macchiato',
                'path_foto' => '/assets/foods/starbucks1.jpg',
                'harga' => 35000,
                'status_tersedia' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
                'toko_users_id_users' =>26
            ],
            [
                'id_menu' => 102,
                'nama_menu' => 'Americano',
                'path_foto' => '/assets/foods/starbucks2.jpg',
                'harga' => 30000,
                'status_tersedia' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
                'toko_users_id_users' =>26
            ],
            [
                'id_menu' => 103,
                'nama_menu' => 'Caffe Mocha',
                'path_foto' => '/assets/foods/starbucks3.jpg',
                'harga' => 33000,
                'status_tersedia' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
                'toko_users_id_users' =>26
            ],
            [
                'id_menu' => 104,
                'nama_menu' => 'Green Tea Latte',
                'path_foto' => '/assets/foods/starbucks4.jpg',
                'harga' => 40000,
                'status_tersedia' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
                'toko_users_id_users' =>26
            ],
            [
                'id_menu' => 105,
                'nama_menu' => 'Matcha Latte',
                'path_foto' => '/assets/foods/starbucks5.jpg',
                'harga' => 44000,
                'status_tersedia' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
                'toko_users_id_users' =>26
            ],

            
        ];
        DB::table('menu')->insert($menus);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'id_users' => 1,
                'nama' => 'Victor',
                'email' => 'victor@gmail.com',
                'password' => Hash::make('123'),
                'picture' => '/123@gmail.com.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,  // Soft delete not applied
                'status_user_id_status' => 1,  // Mahasiswa
            ],
            [
                'id_users' => 2,
                'nama' => 'Reyhan',
                'email' => 'reyhan@gmail.com',
                'password' => Hash::make('123'),
                'picture' => '/Niko@gmail.com.jpeg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,  // Soft delete not applied
                'status_user_id_status' => 1,  // Mahasiswa
            ],
            [
                'id_users' => 3,
                'nama' => 'Pak Budi',
                'email' => 'budi@gmail.com',
                'password' => Hash::make('234'),
                'picture' => '/234@gmail.com.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,  // Soft delete not applied
                'status_user_id_status' => 3,  // Admin
            ],
            [
                'id_users' => 4,
                'nama' => 'Pak Sukri',
                'email' => 'sukri@gmail.com',
                'password' => Hash::make('345'),
                'picture' => '/345@gmail.com.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,  // Soft delete not applied
                'status_user_id_status' => 3,  // Admin
            ],
            [
                'id_users' => 5,
                'nama' => 'Carnival',
                'email' => 'carnival@gmail.com',
                'password' => Hash::make('carnival'),
                'picture' => '/carnival@gmail.com.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,  // Soft delete not applied
                'status_user_id_status' => 2,  // Kantin
            ],
            [
                'id_users' => 6,
                'nama' => 'Japanese Food',
                'email' => 'japanesefood@gmail.com',
                'password' => Hash::make('japanesefood'),
                'picture' => '/japanesefood@gmail.com.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,  // Soft delete not applied
                'status_user_id_status' => 2,  // Kantin
            ],
            [
                'id_users' => 7,
                'nama' => 'Depot Kita',
                'email' => 'depotkita@gmail.com',
                'password' => Hash::make('depotkita'),
                'picture' => '/depotkita@gmail.com.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,  // Soft delete not applied
                'status_user_id_status' => 2,  // Kantin
            ],
            [
                'id_users' => 8,
                'nama' => 'Depot Mapan',
                'email' => 'depotmapan@gmail.com',
                'password' => Hash::make('depotmapan'),
                'picture' => '/depotmapan@gmail.com.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,  // Soft delete not applied
                'status_user_id_status' => 2,  // Kantin
                
            ],
            [
                'id_users' => 9,
                'nama' => 'Kue Nyonya',
                'email' => 'kuenyonya@gmail.com',
                'password' => Hash::make('kuenyonya'),
                'picture' => '/kuenyonya@gmail.com.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,  // Soft delete not applied
                'status_user_id_status' => 2,  // Kantin
            ],
            [
                'id_users' => 10,
                'nama' => 'Soto Ayam Jago',
                'email' => 'sotoayamjago@gmail.com',
                'password' => Hash::make('sotoayamjago'),
                'picture' => '/sotoayamjago@gmail.com',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,  // Soft delete not applied
                'status_user_id_status' => 2,  // Kantin
            ],
            [
                'id_users' => 11,
                'nama' => 'NDOKEE',
                'email' => 'NDOKEE@gmail.com',
                'password' => Hash::make('NDOKEE'),
                'picture' => '/NDOOKE@gmail.com',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,  // Soft delete not applied
                'status_user_id_status' => 2,  // Kantin
            ],
            [
                'id_users' => 12,
                'nama' => 'REMAJA',
                'email' => 'REMAJA@gmail.com',
                'password' => Hash::make('REMAJA'),
                'picture' => '/REMAJA@gmail.com',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,  // Soft delete not applied
                'status_user_id_status' => 2,  // Kantin
            ],
            [
                'id_users' => 13,
                'nama' => 'KOPTE',
                'email' => 'KOPTE@gmail.com',
                'password' => Hash::make('KOPTE'),
                'picture' => '/KOPTE@gmail.com',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,  // Soft delete not applied
                'status_user_id_status' => 2,  // Kantin
            ],
            [
                'id_users' => 14,
                'nama' => 'KEDAI KITA',
                'email' => 'KEDAIKITA@gmail.com',
                'password' => Hash::make('KEDAIKITA'),
                'picture' => '/KEDAIKITA@gmail.com',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,  // Soft delete not applied
                'status_user_id_status' => 2,  // Kantin
            ],
            [
                'id_users' => 15,
                'nama' => 'KxK Resto',
                'email' => 'KxKResto@gmail.com',
                'password' => Hash::make('KxKResto'),
                'picture' => '/KxKResto@gmail.com',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,  // Soft delete not applied
                'status_user_id_status' => 2,  // Kantin
            ],
            [
                'id_users' => 16,
                'nama' => 'Excelso',
                'email' => 'Excelso@gmail.com',
                'password' => Hash::make('Excelso'),
                'picture' => '/Excelso@gmail.com',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,  // Soft delete not applied
                'status_user_id_status' => 2,  // Kantin
            ],
            [
                'id_users' => 17,
                'nama' => 'Dcrepes',
                'email' => 'Dcrepes@gmail.com',
                'password' => Hash::make('Dcrepes'),
                'picture' => '/Dcrepes@gmail.com',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,  // Soft delete not applied
                'status_user_id_status' => 2,  // Kantin
            ],
            [
                'id_users' => 18,
                'nama' => 'Bakso Sapi',
                'email' => 'BaksoSapi@gmail.com',
                'password' => Hash::make('BaksoSapi'),
                'picture' => '/BaksoSapi@gmail.com',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,  // Soft delete not applied
                'status_user_id_status' => 2,  // Kantin
            ],
            [
                'id_users' => 19,
                'nama' => 'Markit ~ Top',
                'email' => 'MarkitTop@gmail.com',
                'password' => Hash::make('MarkitTop'),
                'picture' => '/MarkitTop@gmail.com',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,  // Soft delete not applied
                'status_user_id_status' => 2,  // Kantin
            ],
            [
                'id_users' => 20,
                'nama' => 'Berkat catering',
                'email' => 'Berkatcatering@gmail.com',
                'password' => Hash::make('Berkatcatering'),
                'picture' => '/Berkatcatering@gmail.com',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,  // Soft delete not applied
                'status_user_id_status' => 2,  // Kantin
            ],
            [
                'id_users' => 21,
                'nama' => 'Kedai Hong',
                'email' => 'KedaiHong@gmail.com',
                'password' => Hash::make('KedaiHong'),
                'picture' => '/KedaiHong@gmail.com',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,  // Soft delete not applied
                'status_user_id_status' => 2,  // Kantin
            ],
            [
                'id_users' => 22,
                'nama' => 'Mie 55',
                'email' => 'Mie55@gmail.com',
                'password' => Hash::make('Mie55'),
                'picture' => '/Mie55@gmail.com',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,  // Soft delete not applied
                'status_user_id_status' => 2,  // Kantin
            ],
            [
                'id_users' => 23,
                'nama' => 'Ayam Bakar Pinarak',
                'email' => 'Pinarak@gmail.com',
                'password' => Hash::make('Pinarak'),
                'picture' => '/Pinarak@gmail.com',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,  // Soft delete not applied
                'status_user_id_status' => 2,  // Kantin
            ],
            [
                'id_users' => 24,
                'nama' => 'POKPOK',
                'email' => 'POKPOK@gmail.com',
                'password' => Hash::make('POKPOK'),
                'picture' => '/POKPOK@gmail.com',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,  // Soft delete not applied
                'status_user_id_status' => 2,  // Kantin
            ],
            [
                'id_users' => 25,
                'nama' => 'Chatime',
                'email' => 'Chatime@gmail.com',
                'password' => Hash::make('Chatime'),
                'picture' => '/Chatime@gmail.com',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,  // Soft delete not applied
                'status_user_id_status' => 2,  // Kantin
            ],
            [
                'id_users' => 26,
                'nama' => 'Starbucks',
                'email' => 'Starbucks@gmail.com',
                'password' => Hash::make('Starbucks'),
                'picture' => '/Starbucks@gmail.com',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,  // Soft delete not applied        
                'status_user_id_status' => 2,  // Kantin
            ],
        ];

        DB::table('users')->insert($users);
    }
}

<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminKantinController;
use App\Http\Controllers\AdminTokoController;
use App\Http\Controllers\AdminTransaksiController;
use App\Http\Controllers\AdminUsersController;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\KantinController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\RiwayatController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the 'web' middleware group. Make something great!
|
*/


Route::group(['middleware' => 'auth'], function () {
    Route::group(['middleware' => 'isLogin'], function () {


        // 
        // MAHASISWA
        // 
        Route::group(['prefix' => '/mahasiswa', 'middleware' => 'can:mahasiswa'], function () {
            Route::get('/', [HomeController::class, 'mahasiswa'])->name('home');
            Route::get('/riwayat', [RiwayatController::class, 'index'])->name('history');

            Route::group(['prefix' => '/kantin'], function () {
                Route::get('/{kantin_id}', [KantinController::class, 'index'])->name('store');
            });

            Route::group(['prefix' => '/menu'], function () {
                Route::get('/nota', [MenuController::class, 'nota'])->name('nota');
                Route::post('/pay', [MenuController::class, 'pay'])->name('pay');

                Route::get('/{toko_id}', [MenuController::class, 'index'])->name('toMenu');
            });
        });


        // 
        // KANTIN
        // 
        Route::group(['prefix' => '/kantin', 'middleware' => 'can:toko'], function () {
            Route::get('/', [HomeController::class, 'kantin'])->name('homeCanteen');
            Route::get('/pesanan', [KantinController::class, 'pesanan'])->name('orderCanteen');

            Route::post('/openClose', [KantinController::class, 'bukaTutup'])->name('openClose');
            //MIDDLEWARE BUAT NGECEK TOKO E GANTI MENU E SENDIRI APA DIA GANTI MENU TOKO LAIN
            Route::post('/createmenu', [KantinController::class, 'buatMenu'])->name('createMenu');
            Route::post('/available/{menu_id}', [KantinController::class, 'tersedia'])->name('menuAvailable');
            Route::put('/editmenu/{menu_id}', [KantinController::class, 'ubahMenu'])->name('editMenu');
            Route::delete('/deletemenu/{menu_id}', [KantinController::class, 'deleteMenu'])->name('deleteMenu');

        });


        // 
        // ADMIN
        // 
        Route::group(['prefix' => '/admin', 'middleware' => 'can:admin'], function () {

            Route::get('/{section?}', [AdminController::class, 'index'])->name('admin.index');
            Route::get('/admin/histori-transaksi', [AdminController::class, 'historiTransaksi'])->name('admin.historiTransaksi');

            // CRUD untuk User
            Route::get('/users', [AdminUsersController::class, 'index'])->name('admin.users');
            Route::get('/mahasiswa/create', function () {
                return app()->make(AdminUsersController::class)->createUser('mahasiswa');
            })->name('admin.mahasiswa.create');

            Route::get('/admin/create', function () {
                return app()->make(AdminUsersController::class)->createUser('admin');
            })->name('admin.admin.create');
            Route::post('/users', [AdminUsersController::class, 'storeUser'])->name('admin.users.store');
            Route::get('/users/{id_users}/edit', [AdminUsersController::class, 'editUser'])->name('admin.users.edit');
            Route::put('/users/{id_users}', [AdminUsersController::class, 'updateUser'])->name('admin.users.update');
            Route::delete('/users/{id_users}', [AdminUsersController::class, 'deleteUser'])->name('admin.users.delete');
            Route::get('/{section}/search', [AdminUsersController::class, 'search'])->name('admin.search');
            Route::patch('/users/{id_users}', [AdminUsersController::class, 'restoreUser'])->name('admin.users.restore');

            // Kantin routes

            Route::get('/kantin', [AdminController::class, 'kantin'])->name('admin.kantin');
            Route::get('/kantin/create', [AdminKantinController::class, 'createKantin'])->name('admin.kantin.create');
            Route::post('/kantin', [AdminKantinController::class, 'storeKantin'])->name('admin.kantin.store');
            Route::get('/kantin/{id_kantin}/edit', [AdminKantinController::class, 'editKantin'])->name('admin.kantin.edit');
            Route::put('/kantin/{id_kantin}', [AdminKantinController::class, 'updateKantin'])->name('admin.kantin.update');
            Route::delete('/kantin/{id_kantin}', [AdminKantinController::class, 'deleteKantin'])->name('admin.kantin.delete');
            Route::patch('/kantin/{id_kantin}', [AdminKantinController::class, 'restoreKantin'])->name('admin.kantin.restore');
            // Toko routes
            Route::get('/toko', [AdminController::class, 'toko'])->name('admin.toko');
            Route::get('/toko/create', [AdminTokoController::class, 'createToko'])->name('admin.toko.create');
            Route::post('/toko', [AdminTokoController::class, 'storeToko'])->name('admin.toko.store');
            Route::get('/toko/{id_toko}/edit', [AdminTokoController::class, 'editToko'])->name('admin.toko.edit');
            Route::put('/toko/{id_toko}', [AdminTokoController::class, 'updateToko'])->name('admin.toko.update');
            Route::delete('/toko/{id_toko}', [AdminTokoController::class, 'deleteToko'])->name('admin.toko.delete');
            Route::patch('/toko/{id_toko}', [AdminTokoController::class, 'restoreToko'])->name('admin.toko.restore');


            Route::get('/transaksi/create', [AdminTransaksiController::class, 'createTransaksi'])->name('admin.transaksi.create');
            Route::post('/transaksi', [AdminTransaksiController::class, 'storeTransaksi'])->name('admin.transaksi.store');
            Route::get('/transaksi/{id_transaksi}/edit', [AdminTransaksiController::class, 'editTransaksi'])->name('admin.transaksi.edit');
            Route::put('/transaksi/{id_transaksi}', [AdminTransaksiController::class, 'updateTransaksi'])->name('admin.transaksi.update');
            Route::delete('/transaksi/{id_transaksi}', [AdminTransaksiController::class, 'deleteTransaksi'])->name('admin.transaksi.delete');
            Route::patch('/transaksi/{id_transaksi}', [AdminTransaksiController::class, 'restoreTransaksi'])->name('admin.transaksi.restore');
        });


        // 
        //  API
        // 
        Route::group(['prefix' => '/api'], function () {
            Route::get('/transaksi/{transaksi_id}', [ApiController::class, 'detail'])->name('api_detail_transaksi');
        });
    });
});


Route::middleware('LoggedIn')->group(function () {
    Route::get('/', [LoginController::class, 'index'])->name('login');
    Route::post('/', [LoginController::class, 'checkLogin'])->name('checkLogin');
});

Route::get('/temporary-logout', function () {
    Auth::logout();
    Session::flush();
    return redirect('/');
});
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

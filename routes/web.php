<?php

use GuzzleHttp\Client;
use App\Http\Controllers\Pengunjung;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Payment_Controller;
use App\Http\Controllers\WelcomeController;
// qr cdoes test
use SimpleSoftwareIO\QrCode\Facades\QrCode;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [WelcomeController::class, 'home_cnt'])->name('welcome');

// dashboard after login
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// ROOT menu ADMIN
Route::middleware(['auth', 'verified', 'role:admin'])->group(function () {
    Route::get('/admin/tiket', [AdminController::class, 'view_tiket'])->name('tiket-view');
    Route::get('/admin/user', [AdminController::class, 'user_view'])->name('user-view');
    Route::get('/admin/klien', [AdminController::class, 'client_view'])->name('client-view');
    Route::get('/admin/transaksi', [AdminController::class, 'transaksi_view'])->name('transaksi-view');
});

// action for CRUD for ADMIN
Route::middleware(['auth', 'verified', 'role:admin'])->group(function () {
    // Tiket 
    // tambah tiket
    Route::get('/admin/tiket/tambah', [AdminController::class, 'tambah_view'])->name('tambah-tiket'); //tambah 
    Route::post('/store-tiket', [AdminController::class, 'store_tiket'])->name('store-tiket'); //tambah 
    // edit tiket
    Route::get('admin/tiket/edit-tiket/{id}', [AdminController::class, 'edit_tiket'])->name('tiket-edit');
    Route::put('update-tiket/{id}', [AdminController::class, 'update_tiket'])->name('tiket-update');
    // delete
    Route::delete('delete-tiket/{id}', [AdminController::class, 'delete_tiket'])->name('tiket-delete');
    // lihat only tiket
    Route::get('/admin/tiket/detail/{id}', [AdminController::class, 'detail_tiket'])->name('detail-tiket');

    // User
    // tamabh user
    Route::get('/admin/user/tambah', [AdminController::class, 'view_tambah_user'])->name('tambah-user');
    Route::post('/store-user', [AdminController::class, 'store_user'])->name('store-user');
    // edit tiket
    Route::get('admin/user/edit-user/{id}', [AdminController::class, 'edit_user'])->name('user-edit');
    Route::put('/update-user/{id}', [AdminController::class, 'update_user'])->name('user-update');
    // delete user 
    Route::delete('/delete-user/{id}', [AdminController::class, 'delete_user'])->name('user-delete');

    // change status riwayat transaksi
    Route::delete('/ganti-status/{id}', [AdminController::class, 'ganti_status'])->name('ganti-status');
});



// pengunjung
Route::middleware(['auth', 'verified', 'role:pengunjung'])->group(
    function () {
        Route::get('/tiket', [Pengunjung::class, 'tiket'])->name('tiket');
        Route::get('/transaksi', [Pengunjung::class, 'detail_transaksi'])->name('transaksi');
        // Route::get('/tiket-detail/{id}', [Pengunjung::class, 'detail_tik'])->name('tiket-beli');
        Route::get('/tiket-detail/{id}', [Pengunjung::class, 'detail_tik'])->name('tiket-beli');
        Route::get('/cetak-tiket', [Pengunjung::class, 'lihat_tiket'])->name('cetak');


        // transakski
        Route::post('/checkout', [Payment_Controller::class, 'Checkout'])->name('proses_bayar');
        Route::get('/bayar/{transaksi}', [Payment_Controller::class, 'bayar'])->name('bayar');
        Route::get('/bayar/sukses/{transaksi}', [Payment_Controller::class, 'sukses'])->name('sukses-transaksi');
        Route::get('/re-bayar/{transaksi}', [Payment_Controller::class, 'sukses_2'])->name('sukses-transaksi2');


        // print PDF
        Route::get('/pdf/{id}', [Pengunjung::class, 'gen_pdf'])->name('pdf');
    }
);



// client

Route::middleware(['auth', 'verified', 'role:client'])->group(function () {
    Route::get('/sales', [ClientController::class, 'plotSales'])->name('index');
    Route::get('/tikets', [ClientController::class, 'tampilkanTiketClient'])->name('index2');
    Route::get('/QR-CODE', [ClientController::class, 'check_qr'])->name('qr-code');
    Route::post('/validasi', [ClientController::class, 'validasi'])->name('validasi');
    Route::get('/getData', [ClientController::class, 'getData'])->name('getData');
});


// profile
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

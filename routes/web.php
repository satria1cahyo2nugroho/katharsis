<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;

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

Route::get('/', function () {
    return view('welcome');
});

// dashboard after login
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// ROOT menu ADMIN
Route::middleware(['auth', 'verified', 'role:admin'])->group(function () {
    Route::get('/admin/tiket', [AdminController::class, 'view_tiket'])->name('tiket-view');
    Route::get('/admin/user', [AdminController::class, 'user_view'])->name('user-view');
    Route::get('/admin/klien', [AdminController::class, 'client_view'])->name('client-view');
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
});

Route::get('pengunung', function () {
    return view('dashboard');
})->middleware(['auth', 'verified', 'role:pengunjung'])->name('pegunug');
Route::get('miaw', function () {
    return view('dashboard');
})->middleware(['auth', 'verified', 'role:pengunjung'])->name('miaw');

// profile
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

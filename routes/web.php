<?php

use App\Http\Controllers\adminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\IndexController;
use Illuminate\Support\Facades\Route;
use Spatie\LaravelIgnition\FlareMiddleware\AddJobs;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', [IndexController::class, 'index'])->middleware('auth');

Route::get('/detail-produk/{id}', [IndexController::class, 'detail'])->middleware('auth');
Route::post('/add-cart', [IndexController::class, 'addCart'])->middleware('auth');

Route::get('/keranjang', [IndexController::class, 'keranjang'])->middleware('auth');
Route::post('/pesanan-add', [IndexController::class, 'pesananAdd'])->middleware('auth');
Route::delete('/keranjang-delete/{id}', [IndexController::class, 'keranjangDelete'])->middleware('auth');
Route::get('/riwayat-pembelian', [IndexController::class, 'riwayatPembelian'])->middleware('auth');
Route::get('/dashboard', [adminController::class, 'adminDashboard'])->middleware('auth');;
Route::get('/pesanan-admin', [adminController::class, 'pesananAdmin']);
Route::get('/profile', [adminController::class, 'profileAdmin']);
Route::put('/diterima/{id}', [adminController::class, 'terima']);
Route::put('/ditolak/{id}', [adminController::class, 'tolak']);
Route::put('/updateProfile', [adminController::class, 'updateProfile']);
// Route::get('/login', function () {
//     return view('Login');
// });
Route::get('/login', [AuthController::class, 'login'])->name('login')->middleware('guest');
Route::post('/login-proses', [AuthController::class, 'loginProses'])->middleware('guest');
Route::get('/register', [AuthController::class, 'register'])->middleware('guest');
Route::post('/register-proses', [AuthController::class, 'registerProses'])->middleware('guest');
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth');

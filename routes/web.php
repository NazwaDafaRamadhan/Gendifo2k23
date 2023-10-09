<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WisataController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BudayaController;
use App\Http\Controllers\ProdukController;


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

// Route untuk visitor
Route::get('/', function () {
    return redirect('/home');
});

Route::get('home', function () {
    return view('visitor.welcome');
});

Route::get('about', function(){
    return view('visitor.about.index');
});

Route::get('wisata', function(){
    return view('visitor.wisata.index');
});

Route::get('galeri', function(){
    return view('visitor.galeri.index');
});
Route::get('produk', function(){
    return view('visitor.produk.index');
});

// Route untuk admin

// Route untuk login admin
Route::get('login', function(){
    return view('auth.login');
});

// Route untuk dashboard
Route::get('/dashboard', [DashboardController::class, 'index']);

// Route untuk data wisata
Route::get('/wisata', [WisataController::class, 'index']);

// Route untuk data budaya
Route::get('/budaya', [BudayaController::class, 'index']);
Route::post('/add-budaya/store', [BudayaController::class, 'input']);

// Route untuk data produk
Route::get('/produk', [ProdukController::class, 'index']);
Route::post('/add-produk/store', [ProdukController::class, 'input']);
Route::get('/produk/{id}/modal', [ProdukController::class, 'showForModal']);
Route::post('/produk/update', [ProdukController::class, 'update']);

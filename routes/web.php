<?php

use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WisataController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BudayaController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\KegiatanController;
use Illuminate\Support\Facades\Auth;

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

Route::get('/home', function () {
    return view('visitor.welcome');
});

Route::get('about', function(){
    return view('visitor.about.index');
});

Route::get('/wisata', [WisataController::class, 'view']);

Route::get('/budaya', [BudayaController::class, 'view']);
Route::get('/budaya/{id}', [BudayaController::class, 'artikel']);

Route::get('/produk', [ProdukController::class, 'view']);
Route::get('/produk/{id}', [ProdukController::class, 'artikel']);


// Route untuk admin

// Route untuk login admin
Route::get('/login', [LoginController::class, 'index']);
Route::post('/login', [LoginController::class, 'authenticate']);

// Route untuk logout admin
Route::post('logout', [LoginController::class, 'logout']);

Route::middleware('check')->group(function() {

    // Route untuk dashboard
    Route::get('/dashboard', [DashboardController::class, 'index']);

    // Route untuk data wisata
    Route::get('/wisata-admin', [WisataController::class, 'index']);
    Route::post('/add-wisata/store', [WisataController::class, 'input']);
    Route::get('/wisata-admin/{id}/modal', [WisataController::class, 'showForModal']);
    Route::post('/edit-wisata/update/{id}', [WisataController::class, 'update']);
    Route::get('/wisata-admin/delete/{id}', [WisataController::class, 'delete']);

    // Route untuk data budaya
    Route::get('/budaya-admin', [BudayaController::class, 'index']);
    Route::post('/add-budaya/store', [BudayaController::class, 'input']);
    Route::get('/budaya-admin/{id}/modal', [BudayaController::class, 'showForModal']);
    Route::post('/edit-budaya/update/{id}', [BudayaController::class, 'update']);
    Route::get('/budaya-admin/delete/{id}', [BudayaController::class, 'delete']);

    // Route untuk data produk
    Route::get('/produk-admin', [ProdukController::class, 'index']);
    Route::post('/add-produk/store', [ProdukController::class, 'input']);
    Route::get('/produk-admin/{id}/modal', [ProdukController::class, 'showForModal']);
    Route::post('/edit-produk/update/{id}', [ProdukController::class, 'update']);
    Route::get('/produk-admin/delete/{id}', [ProdukController::class, 'delete']);

    // Route untuk data kegiatan
    Route::get('/kegiatan-admin', [KegiatanController::class, 'index']);
    Route::post('/add-kegiatan/store', [KegiatanController::class, 'input']);
    Route::get('/kegiatan-admin/delete/{id}', [KegiatanController::class, 'delete']);
});
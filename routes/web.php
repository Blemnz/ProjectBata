<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SetWebController;
use App\Http\Controllers\TestimoniController;
use App\Http\Middleware\Admin;
use App\Models\SetWeb;

use Illuminate\Support\Facades\Route;

Route::get('/', [AdminController::class, 'landing']);
Route::get('/pesan', [AdminController::class, 'order']);


// kirim data order
Route::post('/pesan/kirim', [OrderController::class, 'store']);

// admin
Route::middleware(Admin::class)->group(function() {
    Route::get('/dashboard', [AdminController::class, 'index']);
    //product
    Route::get('/dashboard/products', [AdminController::class, 'products']);
    Route::get('/dashboard/product/create', [AdminController::class, 'tambahProduct']);
    Route::post('/dashboard/product/create', [ProductController::class, 'store']);
    Route::get('/dashboard/product/edit/{id}', [AdminController::class, 'editProduct'])->name('editProduct');
    Route::put('/dashboard/product/{id}',[ProductController::class, 'update'])->name('upProduct');
    Route::delete('/dashboard/product/delete/{id}', [ProductController::class, 'destroy']);
    //judul
    Route::get('/dashboard/setting/judul',[SetWebController::class, 'setJudul']);
    Route::PUT('/dashboard/setting/judul',[SetWebController::class, 'upJudul']);
    //map
    Route::get('/dashboard/setting/map',[SetWebController::class, 'setMap']);
    Route::PUT('/dashboard/setting/map',[SetWebController::class, 'upMap']);
    //kontak
    Route::get('/dashboard/setting/kontak',[SetWebController::class, 'setKontak']);
    Route::PUT('/dashboard/setting/kontak',[SetWebController::class, 'upKontak']);
    //testimoni
    Route::get('/dashboard/testimoni',[TestimoniController::class, 'index']);
    Route::get('/dashboard/testimoni/create',[TestimoniController::class, 'create']);
    Route::get('/dashboard/testimoni/{id}/edit',[TestimoniController::class, 'edit']);
    Route::put('/dashboard/testimoni/{id}',[TestimoniController::class, 'update']);
    Route::post('/dashboard/testimoni',[TestimoniController::class, 'store']);
    Route::delete('/dashboard/testimoni/{id}/delete',[TestimoniController::class, 'destroy']);
    // orders
    Route::get('/dashboard/orders/pending',[OrderController::class, 'index']);
    Route::get('/dashboard/orders/selesai',[OrderController::class, 'create']);
    Route::get('/dashboard/orders/cencel',[OrderController::class, 'show']);
    Route::get('/dashboard/orders/{id}/validate',[OrderController::class, 'edit']);
    Route::put('/dashboard/orders/{id}',[OrderController::class, 'update']);
    Route::put('/dashboard/orders/cencel/{id}',[OrderController::class, 'cencel']);
    Route::delete('/dashboard/orders/delete/{id}',[OrderController::class, 'destroy']);
    //cetak
    Route::get('/order/cetakSelesai/{id}',[OrderController::class, 'printSelesai']);
    Route::get('/order/cetakPending/{id}',[OrderController::class, 'printPending']);
    Route::get('/order/cetakCancel/{id}',[OrderController::class, 'printCencel']);
});


//coba
Route::get('/coba', [AdminController::class, 'coba']);

//datamap
Route::get('/api/map', [SetWeb::class, 'dataMap']);

// login
Route::controller(LoginController::class)->group(function () {
    Route::get('/login', 'index');
    Route::post('/login' ,'login');
    Route::post('/logout' ,'logout');
});

// pesan
Route::get('/terkirim', function () {
    return view('pesan');
});

Route::get('/cobaemail', [OrderController::class, 'sender']);


<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Menampilkan semua produk
Route::get('/products', [ProductController::class, 'index']);

// Menampilkan detail produk berdasarkan ID
Route::get('/products/{id}', [ProductController::class, 'show']);

// Membuat produk baru
Route::post('/add-products', [ProductController::class, 'create']);

// Mengupdate produk berdasarkan ID
Route::put('/edit-products/{id}', [ProductController::class, 'update']);

// Menghapus produk berdasarkan ID
Route::post('/del-products/{id}', [ProductController::class, 'destroy']);

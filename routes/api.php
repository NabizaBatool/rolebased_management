<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


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

Route::get('stores', [StoreController::class, 'index'])->name('stores.index');
Route::post('stores/create', [StoreController::class, 'create'])->name('stores.create');
Route::delete('stores/{slug}', [StoreController::class, 'destory'])->name('stores.destory');
Route::put('stores/{slug}', [StoreController::class, 'update'])->name('stores.update');


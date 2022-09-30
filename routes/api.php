<?php
namespace App\Http\Controllers\Api;
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
Route::get('stores/create', function () {
    return view('stores.create');
});
Route::get('stores/{slug}/edit', [StoreController::class, 'edit'])->name('stores.edit');
Route::get('stores', [StoreController::class, 'index'])->name('stores.index');
Route::post('stores/create', [StoreController::class, 'create'])->name('stores.create');
Route::delete('stores/{slug}', [StoreController::class, 'destory'])->name('stores.destory');
Route::put('stores/{slug}', [StoreController::class, 'update'])->name('stores.update');

Route::post('storeoutlets', [StoreOutletController::class, 'store'])->name('storeoutlets.store');
Route::get('storeoutlets/create', [StoreOutletController::class, 'create'])->name('storeoutlets.create');
Route::get('storeoutlets', [StoreOutletController::class, 'index'])->name('storeoutlets.index');
Route::delete('storeoutlets/{id}', [StoreOutletController::class, 'destory'])->name('storeoutlets.destory');

Route::get('storecategories/create', [StoreCategoryController::class, 'create'])->name('storecategories.create');
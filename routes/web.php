<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;

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

// users
Route::get('/auth/register',  function () {
    return view('auth.register');
});

Route::get('/auth/login',  function () {
    return view('auth.login');
});
Route::get('/dashboard', function () {
    return view('dashboard');
});

//users

Route::get('/users', [UserController::class, 'listUser'])->name('users');
Route::get('/adduser', function () {
   return view('users.create');
});
Route::get('/edituser/{id}', [UserController::class, 'editUser']);
Route::get('/deleteuser/{id}', [UserController::class, 'deleteUser']);
Route::post('/adduser', [UserController::class, 'addUser'])->name('adduser');
Route::put('/updateuser/{id}', [UserController::class, 'update']);

//customers 

Route::get('/customers', [CustomerController::class, 'index'])->name('customers.index');
Route::post('/customers/create', [CustomerController::class, 'create'])->name('customers.create');
Route::get('/customers/{id}/edit', [CustomerController::class, 'edit'])->name('customers.edit');
Route::post('/customers/{id}', [CustomerController::class, 'update'])->name('customers.update');
Route::delete('/customers/{id}', [CustomerController::class, 'destory'])->name('customers.destory');



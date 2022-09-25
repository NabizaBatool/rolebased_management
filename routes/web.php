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

Route::get('/users', [UserController::class, 'listUser'])->name('users');
Route::get('/adduser', function () {
   return view('users.create');
});

Route::get('/edituser/{id}', [UserController::class, 'editUser']);
Route::get('/deleteuser/{id}', [UserController::class, 'deleteUser']);
Route::post('/adduser', [UserController::class, 'addUser'])->name('adduser');
Route::put('/updateuser/{id}', [UserController::class, 'update']);

//customers 

Route::get('/customers', [CustomerController::class, 'listCustomer'])->name('customers');

//Route::get('/customers' , [CustomerController::class, 'createCustomer'] );
Route::get('/addcustomer' ,function () {
    return view('customers.create');
});
Route::get('/editcustomer/{id}', [CustomerController::class, 'editCustomer'])->name('editcustomer');

Route::delete('/deletecustomer/{id}', [CustomerController::class, 'deleteCustomer'])->name('deletecustomer');


Route::post('/formsubmit', [CustomerController::class, 'createCustomer']);
 
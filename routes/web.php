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

Route::get('/record', [UserController::class, 'view_user'])->name('user.viewuser');
Route::get('/auth/login',  function () {
    return view('auth.login');
});
Route::get('/auth/register',  function () {
    return view('auth.register');
});
Route::get('/dashboard', function () {
    return view('dashboard');
});
Route::get('/adduser', function () {
    return view('users.create');
});
Route::post('/updateuser/{id}', [UserController::class, 'update']);
Route::post('/adduser', [UserController::class, 'add_user'])->name('user.addUser');
Route::get('/edituser/{id}', [UserController::class, 'edit_user']);

<?php

use App\Http\Controllers\RandomUserController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [RandomUserController::class, 'index'])->name('home');
Route::get('/', [RandomUserController::class, 'index'])->name('index');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::resource('/getUsers', RandomUserController::class);

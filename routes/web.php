<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\StuffController;
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

// Route::get('/', function () {
//     return view('home');
// });
Route::get('/', [StuffController::class, 'index']);
Route::get('/items/{id}', [StuffController::class, 'items']);
Route::post('/items/{id}', [StuffController::class, 'order']);


//login router
Route::get('/login',[LoginController::class,'index'] );
Route::post('/login',[LoginController::class,'login'] );

//logout router
Route::get('logout', [LoginController::class,'logout']);


//register router
Route::get('/register',[RegisterController::class,'index'] );
Route::post('/register',[RegisterController::class,'register'] );


//cart router
Route::get('/cart', [CartController::class,'index']);
Route::post('/delete/{id}', [CartController::class,'delete']);
Route::post('/konfirmasi', [CartController::class,'konfirmasi']);

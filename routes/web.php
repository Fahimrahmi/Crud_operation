<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\COntrollers\ImageController;

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
})->name("home");

Route::resource('/User', UserController::class)->middleware('auth');

Route::get('/login', [AuthController::class,'index']);
Route::post('/login', [AuthController::class,'authenticate'])->name('authenticate');
Route::get('logout', [AuthController::class,'logout'])->name('logout');

Route::get('/register', [AuthController::class,'show']);
Route::post('/register', [AuthController::class,'store'])->name('register');

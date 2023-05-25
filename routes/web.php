<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/login', [AuthController::class,'index'])->name('login');
Route::get('/register', [AuthController::class,'register'])->name('register');
Route::post('/proses-login', [AuthController::class,'proses_login'])->name('proses.login');
Route::post('/proses-register', [AuthController::class,'proses_register'])->name('proses.register');

Route::get('/home', [App\Http\Controllers\HomeController::class,'index'])->name('home');

Route::get('/dashboard', [AuthController::class,'dashboard'])->name('dashboard');
Route::post('logout', [AuthController::class,'logout'])->name('logout');

Route::group(['prefix'=>'admin'],function(){

    Route::resource('customer', CustomerController::class);
    
});

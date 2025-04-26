<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\jurnalController;

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

Route::get('/index', function () {
    return view('welcome');
});

Route::get('/register', [jurnalController::class, 'register'])->name('register');
Route::post('/register/proses', [jurnalController::class, 'prosesRegister'])->name('prosesRegister');

Route::get('/', [jurnalController::class, 'login'])->name('login');
Route::post('/login/proses', [jurnalController::class, 'proseslogin'])->name('proseslogin');
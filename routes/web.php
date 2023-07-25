<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;

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

Route::get('/login',[AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login-process',[AuthController::class, 'login'])->name('login-p');
Route::get('/register',[AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register-process',[AuthController::class, 'registration'])->name('registration');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::post('/verify-bvn', [AuthController::class, 'verify'])->name('verify');

Route::middleware('auth')->group(function () {
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

});

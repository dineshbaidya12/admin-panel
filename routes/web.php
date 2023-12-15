<?php

use App\Http\Controllers\adminController\AuthController;
use App\Http\Controllers\adminController\MainController;
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
})->name('home');

Route::get('/admin/login', [AuthController::class, 'login'])->name('login');
Route::post('/admin/login-action', [AuthController::class, 'adminLoginAction'])->name('admin-login');
Route::get('/admin/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/admins', [AuthController::class, 'adminRedirect'])->name('login-redirect');

Route::middleware(['admin'])->prefix('admin')->group(function () {
    Route::get('dashboard', [MainController::class, 'dashboard'])->name('dashboard');
    Route::get('profile', [MainController::class, 'profile'])->name('profile');
    Route::post('profile-update', [MainController::class, 'profileUpdate'])->name('profile-update');
});

<?php

use App\Http\Controllers\AdminController;
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

Route::get('admin',[AdminController::class,'index']);
Route::get('register', [AdminController::class, 'register']);
Route::post('admin/auth', [AdminController::class, 'auth'])->name('admin.auth');
Route::post('admin/store', [AdminController::class, 'store'])->name('admin.store');
Route::get('dashboard', [AdminController::class, 'dashboard']);
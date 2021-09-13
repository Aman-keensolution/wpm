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

Route::group(['middleware' => 'prevent-back-history'], function () {
    Auth::routes();
    Route::get('admin', [AdminController::class, 'index']);
    Route::get('/', function () {
        return view('welcome');
    });
  
    // Route::get('register', [AdminController::class, 'register']);
    Route::post('admin/auth', [AdminController::class, 'auth'])->name('admin.auth');
    Route::post('admin/store', [AdminController::class, 'store'])->name('admin.store');
    Route::get('dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('userlist', [AdminController::class, 'userlist'])->name('admin.userlist');
    Route::get('logout', [AdminController::class, 'logout'])->name('admin.logout');
    Route::get('block_user/{id}', [AdminController::class, 'block_user'])->name('admin.block_user');
    Route::get('unblock_user/{id}', [AdminController::class, 'unblock_user'])->name('admin.unblock_user');
    Route::get('add_user', [AdminController::class, 'add_user'])->name('admin.add_user');
    Route::get('edit_user/{id}', [AdminController::class, 'edit_user'])->name('admin.edit_user');
    Route::post('update_user/{id}', [AdminController::class, 'update_user'])->name('update_user');
});


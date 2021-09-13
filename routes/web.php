<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BinController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\PlantController;
use App\Http\Controllers\WeighingController;

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
                            //AdminController

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

                            //BinController
    Route::get('bin_list', [BinController::class, 'bin_list'])->name('bin.bin_list');
    Route::get('add_bin', [BinController::class, 'add_bin'])->name('bin.add_bin');
    Route::post('bin/store', [BinController::class, 'store'])->name('bin.store');
    Route::get('edit_bin/{id}', [BinController::class, 'edit_bin'])->name('bin.edit_bin');
    Route::post('update_bin/{id}', [BinController::class, 'update_bin'])->name('update_bin');
    Route::get('block_user/{id}', [BinController::class, 'block_user'])->name('bin.block_user');
    Route::get('unblock_user/{id}', [BinController::class, 'unblock_user'])->name('bin.unblock_user');
    

                            //CategoryController
    Route::get('category_list', [CategoryController::class, 'category_list'])->name('category.category_list');
    Route::get('add_category', [CategoryController::class, 'add_category'])->name('category.add_category');
    Route::post('category/store', [CategoryController::class, 'store'])->name('category.store');
    Route::get('edit_category/{id}', [CategoryController::class, 'edit_category'])->name('category.edit_category');
    Route::post('update_category/{id}', [CategoryController::class, 'update_category'])->name('update_category');
    Route::get('block_user/{id}', [CategoryController::class, 'block_user'])->name('admin.block_user');
    Route::get('unblock_user/{id}', [CategoryController::class, 'unblock_user'])->name('admin.unblock_user');

                            //ItemController
    Route::get('item_list', [ItemController::class, 'item_list'])->name('item.item_list');
    Route::get('add_item', [ItemController::class, 'add_user'])->name('item.add_item');
    Route::post('item/store', [ItemController::class, 'store'])->name('item.store');
    Route::get('edit_item/{id}', [ItemController::class, 'edit_item'])->name('item.edit_item');
    Route::post('update_item/{id}', [ItemController::class, 'update_item'])->name('update_item');
    Route::get('block_user/{id}', [ItemController::class, 'block_user'])->name('item.block_user');
    Route::get('unblock_user/{id}', [ItemController::class, 'unblock_user'])->name('item.unblock_user');

                            //PlantController
    Route::get('plant_list', [PlantController::class, 'plant_list'])->name('plant.plant_list');
    Route::get('add_plant', [PlantController::class, 'add_plant'])->name('plant.add_plant');
    Route::post('plant/store', [PlantController::class, 'store'])->name('plant.store');
    Route::get('edit_plant/{id}', [PlantController::class, 'edit_plant'])->name('plant.edit_plant');
    Route::post('update_plant/{id}', [PlantController::class, 'update_plant'])->name('update_plant');
    Route::get('block_user/{id}', [PlantController::class, 'block_user'])->name('plant.block_user');
    Route::get('unblock_user/{id}', [PlantController::class, 'unblock_user'])->name('plant.unblock_user');

                            //WeighingController
    Route::get('weighing_list', [WeighingController::class, 'weighing_list'])->name('weighing.weighing_list');
    Route::get('add_weighing', [WeighingController::class, 'add_weighing'])->name('weighing.add_weighing');
    Route::post('weighing/store', [WeighingController::class, 'store'])->name('weighing.store');
    Route::get('edit_weighing/{id}', [WeighingController::class, 'edit_weighing'])->name('weighing.edit_weighing');
    Route::post('update_weighing/{id}', [WeighingController::class, 'update_weighing'])->name('update_weighing');
    Route::get('block_user/{id}', [WeighingController::class, 'block_user'])->name('weighing.block_user');
    Route::get('unblock_user/{id}', [WeighingController::class, 'unblock_user'])->name('weighing.unblock_user');
});


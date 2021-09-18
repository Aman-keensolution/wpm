<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BinController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\PlantController;
use App\Http\Controllers\WeighingController;
use App\Http\Controllers\StockController;

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|---------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['middleware' => 'prevent-back-history'], function () {
    Auth::routes();
    Route::get('admin', [AdminController::class, 'index']);
    Route::get('admin', [AdminController::class, 'index'])->name('admin');
    Route::get('/', [AdminController::class, 'index']);
    Route::get('forget_password', [AdminController::class, 'forget_password'])->name('forget_password');
    Route::post('sendForgetPasswordMail', [AdminController::class, 'sendForgetPasswordMail'])->name('admin.sendForgetPasswordMail');
    Route::post('reset_password/{$username}', [AdminController::class, 'reset_password'])->name('admin.reset_password');
    Route::post('adminResetPassword', [AdminController::class, 'adminResetPassword'])->name('admin.adminResetPassword');
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
    Route::post('update_user/{id}', [AdminController::class, 'update_user'])->name('admin.update_user');

                            //CategoryController
    Route::get('category_list', [CategoryController::class, 'category_list'])->name('category.category_list');
    Route::get('sub_category_list', [CategoryController::class, 'sub_category_list'])->name('category.sub_category_list');
    Route::get('add_category', [CategoryController::class, 'add_category'])->name('category.add_category');
    Route::get('add_sub_category', [CategoryController::class, 'add_sub_category'])->name('category.add_sub_category');
    Route::post('category/store', [CategoryController::class, 'store'])->name('category.store');
    Route::post('category/store_sub_category', [CategoryController::class, 'store_sub_category'])->name('category.store_sub_category');
    Route::get('edit_category/{cat_id}', [CategoryController::class, 'edit_category'])->name('category.edit_category');
    Route::get('edit_sub_category/{cat_id}', [CategoryController::class, 'edit_sub_category'])->name('category.edit_sub_category');
    Route::post('update_category/{cat_id}', [CategoryController::class, 'update_category'])->name('update_category');
    Route::post('update_sub_category/{cat_id}', [CategoryController::class, 'update_sub_category'])->name('update_sub_category');
    Route::get('block_category/{cat_id}', [CategoryController::class, 'block_category'])->name('category.block_category');
    Route::get('unblock_category/{cat_id}', [CategoryController::class, 'unblock_category'])->name('category.unblock_category');

                            //PlantController
    Route::get('plant_list', [PlantController::class, 'plant_list'])->name('plant.plant_list');
    Route::get('add_plant', [PlantController::class, 'add_plant'])->name('plant.add_plant');
    Route::post('plant/store', [PlantController::class, 'store'])->name('plant.store');
    Route::get('edit_plant/{plant_id}', [PlantController::class, 'edit_plant'])->name('plant.edit_plant');
    Route::post('update_plant/{plant_id}', [PlantController::class, 'update_plant'])->name('update_plant');
    Route::get('block_plant/{plant_id}', [PlantController::class, 'block_plant'])->name('plant.block_plant');
    Route::get('unblock_plant/{plant_id}', [PlantController::class, 'unblock_plant'])->name('plant.unblock_plant');

    //ItemController
    Route::get('item_list', [ItemController::class, 'item_list'])->name('item.item_list');
    Route::get('add_item', [ItemController::class, 'add_item'])->name('item.add_item');
    Route::post('item/store', [ItemController::class, 'store'])->name('item.store');
    Route::get('edit_item/{item_id}', [ItemController::class, 'edit_item'])->name('item.edit_item');
    Route::post('update_item/{item_id}', [ItemController::class, 'update_item'])->name('update_item');
    Route::get('block_item/{item_id}', [ItemController::class, 'block_item'])->name('item.block_item');
    Route::get('unblock_item/{item_id}', [ItemController::class, 'unblock_item'])->name('item.unblock_item');

                            //WeighingController
    Route::get('weighing_list', [WeighingController::class, 'weighing_list'])->name('weighing.weighing_list');
    Route::get('add_weighing', [WeighingController::class, 'add_weighing'])->name('weighing.add_weighing');
    Route::post('weighing/store', [WeighingController::class, 'store'])->name('weighing.store');
    Route::get('edit_weighing/{weight_scale_id}', [WeighingController::class, 'edit_weighing'])->name('weighing.edit_weighing');
    Route::post('update_weighing/{weight_scale_id}', [WeighingController::class, 'update_weighing'])->name('update_weighing');
    Route::get('block_weighing/{weight_scale_id}', [WeighingController::class, 'block_weighing'])->name('weighing.block_weighing');
    Route::get('unblock_weighing/{weight_scale_id}', [WeighingController::class, 'unblock_weighing'])->name('weighing.unblock_weighing');

                            //BinController
    Route::get('bin_list', [BinController::class, 'bin_list'])->name('bin.bin_list');
    Route::get('add_bin', [BinController::class, 'add_bin'])->name('bin.add_bin');
    Route::post('bin/store', [BinController::class, 'store'])->name('bin.store');
    Route::post('bin/store1', [BinController::class, 'store1'])->name('bin.store1');
    Route::get('edit_bin/{bin_id}', [BinController::class, 'edit_bin'])->name('bin.edit_bin');
    Route::post('update_bin/{bin_id}', [BinController::class, 'update_bin'])->name('update_bin');
    Route::get('block_bin/{bin_id}', [BinController::class, 'block_bin'])->name('bin.block_bin');
    Route::get('unblock_bin/{bin_id}', [BinController::class, 'unblock_bin'])->name('bin.unblock_bin');

                            //StockController
    Route::get('stock_list', [StockController::class, 'stock_list'])->name('stock.stock_list');
    Route::get('add_stock', [StockController::class, 'add_stock'])->name('stock.add_stock');
    Route::post('stock/store', [StockController::class, 'store'])->name('stock.store');
    Route::get('edit_stock/{stock_id}', [StockController::class, 'edit_stock'])->name('stock.edit_stock');
    Route::post('update_stock/{stock_id}', [StockController::class, 'update_stock'])->name('update_stock');
    Route::get('block_stock/{stock_id}', [StockController::class, 'block_stock'])->name('stock.block_stock');
    Route::get('unblock_stock/{stock_id}', [StockController::class, 'unblock_stock'])->name('stock.unblock_stock');
    
    Route::get('get_net_weight/{bin_id}', [StockController::class, 'get_net_weight'])->name('stock.get_net_weight');
    Route::get('get_bin_weight/{id}', [StockController::class, 'get_bin_weight'])->name('stock.get_bin_weight');
    Route::get('get_qty/{id}', [StockController::class, 'get_qty'])->name('stock.get_qty');

});

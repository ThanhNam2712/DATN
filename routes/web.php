<?php

use App\Http\Controllers\Admin\AuthenController;
use App\Http\Controllers\Admin\CartController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\Admin\ColorController;
use App\Http\Controllers\Admin\ProductsController;
use App\Http\Controllers\Admin\ProductTagController;
use App\Http\Controllers\Admin\SizeController;
use App\Http\Controllers\Admin\StatisticController;
use App\Http\Controllers\Admin\TagController;
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
//
Route::group([
    'prefix' => 'login',
    'as' => 'login.'
], function (){
    Route::get('login', [AuthenController::class, 'login'])->name('login');
    Route::get('logout', [AuthenController::class, 'logout'])->name('logout');
    Route::post('login', [AuthenController::class, 'loginPost'])->name('loginPost');
    Route::get('resister', [AuthenController::class, 'resister'])->name('resister');
    Route::post('resister', [AuthenController::class, 'postResister'])->name('postResister');
});


Route::group([
    'prefix' => 'admin',
    'as' => 'admin.',
    'middleware' => 'checkAdmin'
], function (){
    Route::group([
        'prefix' => 'statistic',
        'as' => 'statistic.',
    ], function () {
        Route::get('/', [StatisticController::class, 'index'])->name('index');
    });

    // Color Product
    Route::group([
        'prefix' => 'color',
        'as' => 'color.'
    ], function (){
        Route::get('/', [ColorController::class, 'index'])->name('index');
        Route::get('delete/{id}', [ColorController::class, 'destroy'])->name('destroy');
        Route::post('create', [ColorController::class, 'create'])->name('create');
        Route::put('update', [ColorController::class, 'update'])->name('update');
    });

    // Size Product
    Route::group([
        'prefix' => 'size',
        'as' => 'size.'
    ], function (){
        Route::get('/', [SizeController::class, 'index'])->name('index');
        Route::get('delete/{id}', [SizeController::class, 'destroy'])->name('destroy');
        Route::post('create', [SizeController::class, 'create'])->name('create');
        Route::put('update', [SizeController::class, 'update'])->name('update');
    });

    // Tag Product
    Route::group([
        'prefix' => 'tag',
        'as' => 'tag.'
    ], function(){
        Route::get('/', [TagController::class, 'index'])->name('index');
        Route::get('delete/{id}', [TagController::class, 'destroy'])->name('destroy');
        Route::post('create', [TagController::class, 'create'])->name('create');
        Route::put('update', [TagController::class, 'update'])->name('update');
    });

    // Product Tag
    Route::group([
        'prefix' => 'product_tag',
        'as' => 'product_tag.'
    ], function(){
        Route::get('/', [ProductTagController::class, 'index'])->name('index');
        Route::delete('delete/{id}', [ProductTagController::class, 'destroy'])->name('destroy');
        Route::post('create', [ProductTagController::class, 'create'])->name('create');
        Route::put('update/{id}', [ProductTagController::class, 'update'])->name('update');
    });

    // Product
    Route::group([
        'prefix' => 'products',
        'as' => 'products.'
    ], function (){
        Route::get('/', [ProductsController::class, 'index'])->name('index');
        Route::get('create', [ProductsController::class, 'create'])->name('create');
        Route::post('create', [ProductsController::class, 'store'])->name('store');
        Route::get('update/{id}', [ProductsController::class, 'edit'])->name('edit');
        Route::put('update/{id}', [ProductsController::class, 'update'])->name('update');
        Route::delete('destroy/{id}', [ProductsController::class, 'destroy'])->name('destroy');
    });

    // Cart
    Route::group([
        'prefix' => 'cart',
        'as' => 'cart.'
    ], function (){
        Route::get('/', [CartController::class, 'index'])->name('index');
    });
});

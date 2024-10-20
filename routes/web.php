<?php

use App\Http\Controllers\Admin\brandController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\Admin\ColorController;
use App\Http\Controllers\Admin\ProductsController;
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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/admin/dashboard', function () {
    return view('admin.layouts.master'); // Chỉ định view cho trang dashboard
});
Route::prefix('admin/categories')->name('admin.categories.')->group(function () {
    Route::get('/', [CategoryController::class, 'index'])->name('index');
    Route::get('/create', [CategoryController::class, 'create'])->name('create');
    Route::post('/store', [CategoryController::class, 'store'])->name('store'); // Removed {id}
    Route::get('/{id}/edit', [CategoryController::class, 'edit'])->name('edit');
    Route::put('/{id}', [CategoryController::class, 'update'])->name('update');
    Route::delete('/{id}', [CategoryController::class, 'destroy'])->name('destroy');
});
// --------------------------Dũng----------------------------------
Route::resource('admin/brands', BrandController::class);


//-----------------------------------------------------------------

Route::group([
    'prefix' => 'admin',
    'as' => 'admin.'
], function (){
    Route::group([
        'prefix' => 'statistic',
        'as' => 'statistic.',
    ], function () {
        Route::get('/', [StatisticController::class, 'index'])->name('index');
    });

    Route::group([
        'prefix' => 'color',
        'as' => 'color.'
    ], function (){
        Route::get('/', [ColorController::class, 'index'])->name('index');
        Route::get('delete/{id}', [ColorController::class, 'destroy'])->name('destroy');
        Route::post('create', [ColorController::class, 'create'])->name('create');
        Route::put('update', [ColorController::class, 'update'])->name('update');
    });

    Route::group([
        'prefix' => 'size',
        'as' => 'size.'
    ], function (){
        Route::get('/', [SizeController::class, 'index'])->name('index');
        Route::get('delete/{id}', [SizeController::class, 'destroy'])->name('destroy');
        Route::post('create', [SizeController::class, 'create'])->name('create');
        Route::put('update', [SizeController::class, 'update'])->name('update');
    });

    Route::group([
        'prefix' => 'tag',
        'as' => 'tag.'
    ], function(){
        Route::get('/', [TagController::class, 'index'])->name('index');
        Route::get('delete/{id}', [TagController::class, 'destroy'])->name('destroy');
        Route::post('create', [TagController::class, 'create'])->name('create');
        Route::put('update', [TagController::class, 'update'])->name('update');
    });

    Route::group([
        'prefix' => 'products',
        'as' => 'products.'
    ], function (){
        Route::get('/', [ProductsController::class, 'index'])->name('index');
        Route::get('create', [ProductsController::class, 'create'])->name('create');
        Route::post('create', [ProductsController::class, 'store'])->name('store');
        Route::get('edit/{id}', [ProductsController::class, 'edit'])->name('edit');
        Route::put('/{id}', [ProductsController::class, 'update'])->name('update');
        Route::delete('destroy/{id}', [ProductsController::class, 'destroy'])->name('destroy');
    });
});

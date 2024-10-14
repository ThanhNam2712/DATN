<?php

use App\Http\Controllers\Api\ProductsColorController;
use App\Http\Controllers\Api\ProductsController;
use App\Http\Controllers\Api\ProductsSizeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::group([
    'prefix' => 'admin',
    'as' => 'admin.'
], function (){
//    Route::group([
//        'prefix' => 'statistic',
//        'as' => 'statistic.',
//    ], function () {
//        Route::get('/', [StatisticController::class, 'index'])->name('index');
//    });
//
    Route::group([
        'prefix' => 'color',
        'as' => 'color.'
    ], function (){
        Route::get('/', [ProductsColorController::class, 'index'])->name('index');

    });

    Route::group([
        'prefix' => 'size',
        'as' => 'size.'
    ], function (){
        Route::get('/', [ProductsSizeController::class, 'index'])->name('index');
    });
//
//    Route::group([
//        'prefix' => 'tag',
//        'as' => 'tag.'
//    ], function(){
//        Route::get('/', [TagController::class, 'index'])->name('index');
//        Route::get('delete/{id}', [TagController::class, 'destroy'])->name('destroy');
//        Route::post('create', [TagController::class, 'create'])->name('create');
//        Route::put('update', [TagController::class, 'update'])->name('update');
//    });

    Route::group([
        'prefix' => 'products',
        'as' => 'products.'
    ], function (){
        Route::get('/', [ProductsController::class, 'index'])->name('index');
    });
});

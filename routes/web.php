<?php
use App\Http\Controllers\Admin\AuthenController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CartController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\ShipmentController;
use App\Http\Controllers\Admin\VariantProductController;
use App\Http\Controllers\Client\ForgotPasswordController;
use App\Http\Controllers\Client\OrderControllerClient;
use App\Http\Controllers\Client\ResetPasswordController;
use App\Http\Controllers\Client\ClientCartController;
use App\Http\Controllers\Client\ClientOrderController;
use App\Http\Controllers\Client\HomeController;
use App\Http\Controllers\Client\LoginController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Client\RegisterController;
use App\Http\Controllers\Client\ShopController;
use App\Http\Controllers\Client\UserEditController;
use App\Http\Controllers\Admin\ColorController;
use App\Http\Controllers\Admin\CouponController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductsController;
use App\Http\Controllers\Admin\ProductTagController;
use App\Http\Controllers\Admin\ReviewsController;
use App\Http\Controllers\Admin\SizeController;
use App\Http\Controllers\Admin\StatisticController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Client\VerifyEmailController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('client.home');
// });
Route::get('/', [ProductsController::class, 'home'])->name('home');
Route::get('gioi-thieu', [ProductsController::class, 'gioiThieu'])->name('gioithieu');
Route::get('lien-he', [ProductsController::class, 'lienHe'])->name('lienhe');
Route::get('detail/{id}', [ProductsController::class, 'show'])->name('detail');

 Route::group([
     'prefix' => 'client',
     'as' => 'client.'
 ], function (){

     Route::group([
         'prefix' => 'home',
         'as' => 'home.'
     ], function (){
         Route::get('/', [HomeController::class, 'index'])->name('home');
         Route::get('detail/{id}', [HomeController::class, 'detail'])->name('detail');
         Route::post('post', [HomeController::class, 'postReview'])->name('postReview');
     });

     Route::group([
         'prefix' => 'home',
         'as' => 'home.'
     ], function (){
         Route::get('/', [HomeController::class, 'index'])->name('home');
         Route::get('detail/{id}/color/{idColor}', [HomeController::class, 'detail'])->name('detail');
         Route::post('post', [HomeController::class, 'postReview'])->name('postReview');
     });



    Route::group([
        'prefix' => 'cart',
        'as' => 'cart.'
    ], function (){
        Route::get('/', [ClientCartController::class, 'index'])->name('index');
        Route::post('add', [ClientCartController::class, 'add'])->name('add');
        Route::post('update/{id}', [ClientCartController::class, 'updateCart'])->name('updateCart');
        Route::get('delete/{id}', [ClientCartController::class, 'deleteCart'])->name('deleteCart');
    });

    Route::group([
        'prefix' => 'order',
        'as' => 'order.',
    ], function (){
        Route::get('/', [ClientOrderController::class, 'index'])->name('index');
        Route::get('coupon', [ClientOrderController::class, 'coupon'])->name('coupon');
        Route::post('create', [ClientOrderController::class, 'create'])->name('create');
        Route::get('confirm/{id}', [ClientOrderController::class, 'confirm'])->name('confirm');
        Route::get('view', [OrderControllerClient::class, 'index'])->name('index');
        Route::get('detail/{id}', [OrderControllerClient::class, 'detail'])->name('detail');
    });

    Route::group([
        'prefix' => 'shop',
        'as' => 'shop.'
    ], function (){
        Route::get('/', [ShopController::class, 'index'])->name('index');
        Route::get('category/{name}', [ShopController::class, 'category'])->name('category');
    });

    Route::group([
        'prefix' => 'reset',
        'as' => 'reset.'
    ], function (){
        Route::get('password', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('showLinkRequestForm');
        Route::post('password', [ForgotPasswordController::class, 'postNotPass'])->name('postNotPass');
        Route::get('resetPass/{token}', [ForgotPasswordController::class, 'resetPass'])->name('resetPass');
        Route::post('resetPass/{id}', [ForgotPasswordController::class, 'confirmPass'])->name('confirmPass');
    });



    Route::group([
        'prefix' => 'profile',
        'as' => 'profile.'
    ], function (){
        Route::get('/', [UserEditController::class, 'index'])->name('index');
        Route::post('create', [UserEditController::class, 'store'])->name('store');
        Route::put('update/{id}', [UserEditController::class, 'update'])->name('update');
        Route::put('changePass', [UserEditController::class, 'changePass'])->name('changePass');
        Route::put('changeAddress/{id}', [UserEditController::class, 'changeAddress'])->name('changeAddress');
        Route::delete('delete/{id}', [UserEditController::class, 'delete'])->name('delete');
    });

});



Route::get('/admin/dashboard', function () {
    return view('admin.layouts.master');
});
Route::prefix('admin/categories')->name('admin.categories.')->group(function () {
    Route::get('/', [CategoryController::class, 'index'])->name('index');
    Route::get('/create', [CategoryController::class, 'create'])->name('create');
    Route::post('/store', [CategoryController::class, 'store'])->name('store');
    Route::get('/{id}/edit', [CategoryController::class, 'edit'])->name('edit');
    Route::put('/{id}', [CategoryController::class, 'update'])->name('update');
    Route::delete('/{id}', [CategoryController::class, 'destroy'])->name('destroy');
});
Route::resource('admin/brands', BrandController::class);

Route::prefix('admin/users')->name('admin.users.')->group(function () {
    Route::get('/', [UserController::class, 'index'])->name('index');
    Route::get('/{id}/edit', [UserController::class, 'edit'])->name('edit');
    Route::put('/{id}', [UserController::class, 'update'])->name('update');
    Route::delete('/{id}', [UserController::class, 'destroy'])->name('destroy');
    Route::get('/create', [UserController::class, 'create'])->name('create');
    Route::post('/create', [UserController::class, 'store'])->name('store');


});

Route::middleware(['auth'])->group(function () {
    //thông tin tk
    Route::get('/user/account', [UserEditController::class, 'index'])->name('auth.user.account');
    //sửa tk
    Route::get('/user/edit', [UserEditController::class, 'editProfile'])->name('auth.user.edit');
    Route::put('/user/update', [UserEditController::class, 'updateProfile'])->name('auth.user.update');
    //tạo địa chỉ
    Route::get('/user/create', [UserEditController::class, 'addAddresses'])->name('auth.address.create');
    Route::post('/user/store', [UserEditController::class, 'storeAddAddress'])->name('auth.address.store');
    //sửa địa chỉ
    Route::get('/user/account/edit/{id}', [UserEditController::class, 'editAddress'])->name('auth.address.edit');
    Route::put('/user/address/update/{id}', [UserEditController::class, 'updateAddress'])->name('auth.address.update');
    //xoá địa chỉ
    Route::delete('/user/destroy/{id}', [UserEditController::class, 'destroy'])->name('auth.address.destroy');

Route::get('/get-districts', [UserEditController::class, 'getDistricts'])->name('get.districts');
Route::get('/get-wards', [UserEditController::class, 'getWards'])->name('get.wards');

});

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

Route::prefix('account')->as('account.')->group(function () {
    Route::get('show-register', [RegisterController::class, 'showForm'])->name('showForm');
    Route::post('register', [RegisterController::class, 'register'])->name('register');
    Route::get('show-login', [LoginController::class, 'showFormLogin'])->name('showFormLogin');
    Route::post('login', [LoginController::class, 'login'])->name('login');
    Route::get('logout', [LoginController::class, 'logout'])->name('logout');


    Route::get('password/forgot', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
    Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
    Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
    Route::post('password/reset', [ResetPasswordController::class, 'reset'])->name('password.update');


    Route::get('verify/{user}', [VerifyEmailController::class, 'verify'])
        ->name('verify.email')
        ->middleware('signed');
        Route::get('resend-verification', [VerifyEmailController::class, 'resendVerification'])->name('resendVerification');


});

Route::group([
    'prefix' => 'admin',
    'as' => 'admin.',
    'middleware' => 'checkAdmin'
], function () {
    Route::group([
        'prefix' => 'statistic',
        'as' => 'statistic.'
    ], function () {
        Route::get('/', [StatisticController::class, 'index'])->name('index');
    });

    Route::group([
        'prefix' => 'color',
        'as' => 'color.'
    ], function () {
        Route::get('/', [ColorController::class, 'index'])->name('index');
        Route::get('delete/{id}', [ColorController::class, 'destroy'])->name('destroy');
        Route::post('create', [ColorController::class, 'create'])->name('create');
        Route::put('update', [ColorController::class, 'update'])->name('update');
    });

    Route::group(
        ['prefix' => 'size',
            'as' => 'size.'
        ], function () {
        Route::get('/', [SizeController::class, 'index'])->name('index');
        Route::get('delete/{id}', [SizeController::class, 'destroy'])->name('destroy');
        Route::post('create', [SizeController::class, 'create'])->name('create');
        Route::put('update', [SizeController::class, 'update'])->name('update');
    });

    Route::group(
        ['prefix' => 'tag',
            'as' => 'tag.'
        ], function () {
        Route::get('/', [TagController::class, 'index'])->name('index');
        Route::get('delete/{id}', [TagController::class, 'destroy'])->name('destroy');
        Route::post('create', [TagController::class, 'create'])->name('create');
        Route::put('update', [TagController::class, 'update'])->name('update');
    });

    Route::group(
        ['prefix' => 'product_tag',
            'as' => 'product_tag.'
        ], function () {
        Route::get('/', [ProductTagController::class, 'index'])->name('index');
        Route::delete('delete/{id}', [ProductTagController::class, 'destroy'])->name('destroy');
        Route::post('create', [ProductTagController::class, 'create'])->name('create');
        Route::put('update/{id}', [ProductTagController::class, 'update'])->name('update');
    });

    Route::group([
        'prefix' => 'products',
        'as' => 'products.'
    ], function () {
        Route::get('/', [ProductsController::class, 'index'])->name('index');
        Route::get('show/{id}', [ProductsController::class, 'show'])->name('show');
        Route::get('create', [ProductsController::class, 'create'])->name('create');
        Route::post('create', [ProductsController::class, 'store'])->name('store');
        Route::get('edit/{id}', [ProductsController::class, 'edit'])->name('edit');
        Route::put('/{id}', [ProductsController::class, 'update'])->name('update');
        Route::delete('destroy/{id}', [ProductsController::class, 'destroy'])->name('destroy');
        Route::get('softDelete', [ProductsController::class, 'soft'])->name('soft');
        Route::put('softDelete/{id}', [ProductsController::class, 'restore'])->name('restore');
    });

    Route::group([
        'prefix' => 'gallery',
        'as' => 'gallery.',
    ], function (){
        Route::get('/product/{id}', [GalleryController::class, 'index'])->name('index');
        Route::get('/product/{id}/create/{idVariant}', [GalleryController::class, 'create'])->name('create');
        Route::post('/product/{id}/create/', [GalleryController::class, 'store'])->name('store');
        Route::put('/update/{id}', [GalleryController::class, 'update'])->name('update');
    });

    Route::group([
        'prefix' => 'variant',
        'as' => 'variant.'
    ], function (){
        Route::get('/{id}', [VariantProductController::class, 'index'])->name('index');
        Route::post('create', [VariantProductController::class, 'create'])->name('create');
        Route::put('update', [VariantProductController::class, 'update'])->name('update');
        Route::get('delete/{id}', [VariantProductController::class, 'delete'])->name('delete');
    });


    // Coupon
    Route::group([
        'prefix' => 'coupon',
        'as' => 'coupon.'
    ], function () {
        Route::get('/', [CouponController::class, 'index'])->name('index');
        Route::get('create', [CouponController::class, 'create'])->name('create');
        Route::post('create', [CouponController::class, 'store'])->name('store');
        Route::get('update/{id}', [CouponController::class, 'update'])->name('update');
        Route::put('update/{id}', [CouponController::class, 'edit'])->name('edit');
        Route::delete('delete/{id}', [CouponController::class, 'delete'])->name('delete');
    });

    // order
    Route::group([
        'prefix' => 'order',
        'as' => 'order.'
    ], function () {
        Route::get('/', [OrderController::class, 'index'])->name('index');

        Route::post('create', [OrderController::class, 'create'])->name('create');
        Route::get('list', [OrderController::class, 'listOrders'])->name('list');
        Route::get('coupon', [OrderController::class, 'coupon'])->name('coupon');

        // Route::post('update/{id}', [CartController::class, 'updateCart'])->name('updateCart');
        // Route::get('delete/{id}', [CartController::class, 'deleteCart'])->name('deleteCart');
    });

    Route::group(
        ['prefix' => 'orders',
            'as' => 'orders.'
        ], function () {
        Route::get('/', [OrderController::class, 'index'])->name('index');
        Route::get('detail/{id}', [OrderController::class, 'detail'])->name('detail');
        Route::put('update-status/{id}', [OrderController::class, 'updateStatus'])->name('updateStatus');
        Route::put('cancel/{id}', [OrderController::class, 'cancel'])->name('cancel');
        Route::get('get-id-by-barcode', [OrderController::class, 'getById'])->name('getById');
    });

    // reviews

    Route::group([
        'prefix' => 'review',
        'as' => 'review.'
    ], function (){
        Route::get('/', [ReviewsController::class, 'index'])->name('index');
        Route::delete('delete/{id}', [ReviewsController::class, 'delete'])->name('delete');
    });

    Route::group([
        'prefix' => 'shipment',
        'as' => 'shipment.'
    ], function (){
        Route::get('/', [ShipmentController::class, 'index'])->name('index');
        Route::get('delivery', [ShipmentController::class, 'delivery'])->name('delivery');
        Route::get('delivery/{id}', [ShipmentController::class, 'detail'])->name('detail');
        Route::put('update/{id}', [ShipmentController::class, 'update'])->name('update');
        Route::put('cancel/{id}', [ShipmentController::class, 'cancel'])->name('cancel');
        Route::delete('delete/{id}', [ShipmentController::class, 'delete'])->name('delete');
        Route::post('/', [ShipmentController::class, 'postOrder'])->name('postOrder');
    });
});

//Auth::routes();
//
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

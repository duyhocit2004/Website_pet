<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\auth\AuthController;
use App\Http\Controllers\admin\homeController;
use App\Http\Controllers\admin\userController;
use App\Http\Controllers\client\CartController;
use App\Http\Controllers\admin\BannerController;
use App\Http\Controllers\admin\productController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\NetWeightController;
use App\Http\Controllers\admin\OrderController;
use App\Http\Controllers\admin\VoucherController;
use App\Http\Controllers\client\DetailProductController;
use App\Http\Controllers\client\SearchProductController;

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
    return view('client.index');
})->name('home');
Route::get('formLogin', [AuthController::class, 'formLogin'])->name('formLogin');
Route::post('loginUser', [AuthController::class, 'login'])->name('loginUser');
Route::get('formLoginAdmin', [AuthController::class, 'formLoginAdmin'])->name('formLoginAdmin');
Route::post('loginAdmin', [AuthController::class, 'loginAdmin'])->name('loginAdmin');
Route::get('formRegister', [AuthController::class, 'formRegister'])->name('formRegister');
Route::post('register', [AuthController::class, 'register'])->name('register');
Route::get('formForgotPassword', [AuthController::class, 'formForgotPassword'])->name('formForgotPassword');
Route::post('forgotPassword', [AuthController::class, 'forgotPassword'])->name('forgotPassword');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

Route::get('redirectToGoogle', [AuthController::class, 'redirectToGoogle'])->name('redirectToGoogle');
Route::get('handleGoogleCallback', [AuthController::class, 'handleGoogleCallback']);

Route::get('redirectToFacebook', [AuthController::class, 'redirectToFacebook'])->name('redirectToFacebook');
Route::get('handleFacebookCallback', [AuthController::class, 'handleFacebookCallback']);

Route::get('redirectToBitbucket', [AuthController::class, 'redirectToBitbucket'])->name('redirectToBitbucket');
Route::get('handleBitbucketCallback', [AuthController::class, 'handleBitbucketCallback']);

Route::get('pageSreach',[SearchProductController::class,'pageSreach'])->name('pageSreach');
Route::get('productDetail/{id}',[DetailProductController::class,'DetailProduct'])->name('DetailProduct');
Route::post('AddCart',[CartController::class,'AddCart'])->name('AddCart');


// Route::get('')




Route::prefix('admin')->middleware(['auth.admin'])->group(function () {
    Route::get('DoashBoard', [homeController::class, 'index'])->name('homeAdmin');
    Route::prefix('product')->group(function () {
        Route::get('GetAllProductPaginate', [productController::class, 'GetAllProductPaginate'])->name('GetAllProductPaginate');
        Route::get('FormAddProduct', [productController::class, 'FormAddProduct'])->name('FormAddProduct');
        Route::Post('PostAddProduct', [ProductController::class, 'PostAddProduct'])->name('PostAddProduct');
        Route::get('GetproductById/{id}', [ProductController::class, 'GetproductById'])->name('GetproductById');
        Route::put('UpdateProductById/{id}', [ProductController::class, 'UpdateProductById'])->name('UpdateProductById');
        Route::put('DeleteProductById/{id}', [productController::class, 'DeleteProductById'])->name('DeleteProductById');
    });
    Route::prefix('netWeight')->group(function () {
        Route::get('GetNetWeight', [NetWeightController::class, 'GetNetWeight'])->name('GetNetWeight');
        Route::get('FormNetWeight', [NetWeightController::class, 'FormNetWeight'])->name('FormNetWeight');
        Route::Post('AddNetWeight', [NetWeightController::class, 'AddNetWeight'])->name('AddNetWeight');
        Route::get('GetNetWeightByID/{id}', [NetWeightController::class, 'GetNetWeightByID'])->name('GetNetWeightByID');
        Route::put('UpdateNetWeightByID/{id}', [NetWeightController::class, 'UpdateNetWeightByID'])->name('UpdateNetWeightByID');
        Route::delete('DeleteNetWeight/{id}', [NetWeightController::class, 'DeleteNetWeight'])->name('DeleteNetWeight');
    });
    Route::prefix('User')->group(function () {
        Route::get('GetPageUser', [userController::class, 'GetPageUser'])->name('GetPageUser');
        Route::get('GetPageStaff', [userController::class, 'GetPageStaff'])->name('GetPageStaff');
        Route::put('LockAcount/{id}', [userController::class, 'LockAcount'])->name('LockAcount');
        Route::put('UnLockAcount/{id}', [userController::class, 'UnLockAcount'])->name('UnLockAcount');
        Route::get('DetailAcount/{id}', [userController::class, 'DetailAcount'])->name('DetailAcount');
        Route::put('UpdateAcount/{id}', [userController::class, 'UpdateAccount'])->name('UpdateAccount');
    });
    Route::prefix('category')->group(function () {
        Route::get('GetListCategory', [CategoryController::class, 'GetListCategory'])->name('GetListCategory');
        Route::get('FormAddCategory', [CategoryController::class, 'FormAddCategory'])->name('FormAddCategory');
        Route::post('AddCategory', [CategoryController::class, 'AddCategory'])->name('AddCategory');
        Route::get('GetCategoryById/{id}', [CategoryController::class, 'GetCategoryById'])->name('GetCategoryById');
        Route::put('UpdateCategoryById/{id}', [CategoryController::class, 'UpdateCategoryById'])->name('UpdateCategoryById');
        Route::delete('DeleteCategory/{id}', [CategoryController::class, 'DeleteCategory'])->name('DeleteCategory');
    });
    Route::prefix('Banner')->group(function () {
        Route::get('GetAllBanner', [BannerController::class, 'GetAllBanner'])->name('GetAllBanner');
        Route::get('FormAddBanner', [BannerController::class, 'FormAddBanner'])->name('FormAddBanner');
        Route::post('AddBanner', [BannerController::class, 'AddBanner'])->name('AddBanner');
        Route::get('GetBannerById/{id}', [BannerController::class, 'GetBannerById'])->name('GetBannerById');
        Route::put('UpdateBannerById/{id}', [BannerController::class, 'UpdateBannerById'])->name('UpdateBannerById');
        Route::delete('DeleteBannerById/{id}', [BannerController::class, 'DeleteBannerById'])->name('DeleteBannerById');
    });
    Route::prefix('Order')->group(function (){
        Route::get('GetAllOrder', [OrderController::class, 'GetAllOrder'])->name('GetAllOrder');
        Route::get('GetDetailOrder/{id}', [OrderController::class, 'GetDetailOrder'])->name('GetDetailOrder');
        Route::put('UpdateOrder/{id}', [OrderController::class, 'UpdateOrder'])->name('UpdateOrder');
        Route::delete('GetFormAdd/{id}', [OrderController::class, 'GetFormAdd'])->name('GetFormAdd');
    });
    Route::prefix('Voucher')->group(function (){
        Route::get('getAllVoucher', [VoucherController::class, 'getAllVoucher'])->name('getAllVoucher');
        Route::get('FormAddVoucher', [VoucherController::class, 'FormAddVoucher'])->name('FormAddVoucher');
        Route::post('AddVoucher', [VoucherController::class, 'AddVoucher'])->name('AddVoucher');
        Route::get('GetVoucherById/{id}', [VoucherController::class, 'GetVoucherById'])->name('GetVoucherById');
        Route::put('UpdateVoucherById/{id}', [VoucherController::class, 'UpdateVoucherById'])->name('UpdateVoucherById');
        Route::put('LockAndUnLockVoucher/{id}', [VoucherController::class, 'LockAndUnLockVoucher'])->name('LockAndUnLockVoucher');
    });
});

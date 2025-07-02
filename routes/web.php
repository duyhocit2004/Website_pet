<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\auth\AuthController;
use App\Http\Controllers\admin\homeController;
use App\Http\Controllers\admin\productController;
use App\Http\Controllers\admin\NetWeightController;
use App\Http\Controllers\admin\userController;

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

Route::prefix('admin')->middleware(['auth.admin'])->group(function () {
    Route::get('home', [homeController::class, 'index'])->name('homeAdmin');
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
        Route::put('UpdateAcount/{id}',[userController::class,'UpdateAccount'])->name('UpdateAccount');
    });
});

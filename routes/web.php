<?php

use App\Http\Controllers\admin\homeController;
use App\Http\Controllers\admin\productController;
use App\Http\Controllers\auth\AuthController;
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
    return view('client.index');
})->name('home');
Route::get('formLogin',[AuthController::class,'formLogin'])->name('formLogin');
Route::post('loginUser',[AuthController::class,'login'])->name('loginUser');
Route::get('formLoginAdmin',[AuthController::class,'formLoginAdmin'])->name('formLoginAdmin');
Route::post('loginAdmin',[AuthController::class,'loginAdmin'])->name('loginAdmin');
Route::get('formRegister',[AuthController::class,'formRegister'])->name('formRegister');
Route::post('register',[AuthController::class,'register'])->name('register');
Route::get('formForgotPassword',[AuthController::class,'formForgotPassword'])->name('formForgotPassword');
Route::post('forgotPassword',[AuthController::class,'forgotPassword'])->name('forgotPassword');
Route::get('logout',[AuthController::class,'logout'])->name('logout');

Route::get('redirectToGoogle',[AuthController::class,'redirectToGoogle'])->name('redirectToGoogle');
Route::get('handleGoogleCallback',[AuthController::class,'handleGoogleCallback']);

Route::get('redirectToFacebook',[AuthController::class,'redirectToFacebook'])->name('redirectToFacebook');
Route::get('handleFacebookCallback',[AuthController::class,'handleFacebookCallback']);

Route::get('redirectToBitbucket',[AuthController::class,'redirectToBitbucket'])->name('redirectToBitbucket');
Route::get('handleBitbucketCallback',[AuthController::class,'handleBitbucketCallback']);

Route::prefix('admin')->middleware(['auth.admin'])->group(function (){
Route::get('home',[homeController::class,'index'])->name('homeAdmin');
    Route::prefix('product')->group(function (){
        Route::get('GetAllProductPaginate', [productController::class,'GetAllProductPaginate'])->name('GetAllProductPaginate');
        Route::get('FormAddProduct',[productController::class,'FormAddProduct'])->name('FormAddProduct');
        Route::Post('PostAddProduct',[ProductController::class,'PostAddProduct'])->name('PostAddProduct');
        Route::get('GetproductById/{id}',[ProductController::class,'GetproductById'])->name('GetproductById');
        Route::put('UpdateProductById/{id}',[ProductController::class,'UpdateProductById'])->name('UpdateProductById');
        Route::put('DeleteProductById/{id}',[productController::class,'DeleteProductById'])->name('DeleteProductById');
    });
    Route::prefix('size')->group(function(){
        
    }); 
});

<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\client\mainController;
use App\Http\Controllers\API\AllVariantController;
use App\Http\Controllers\client\SearchProductController;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();

Route::get('Allbanner',[mainController::class,'getAllproduct']);
Route::get('GetListFeaturedProducts',[mainController::class,'GetListFeaturedProducts']);
Route::get('ShopbyCategories',[mainController::class,'ShopbyCategories']);
Route::get('Bannersecondary',[mainController::class,'Bannersecondary']);

Route::get('Sreachproduct',[SearchProductController::class,'GetAllProduct']);
Route::get('productVariant/{id}',[AllVariantController::class,'GetAllVariantProduct']);





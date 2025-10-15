<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\client\mainController;
use App\Http\Controllers\API\AllVariantController;
use App\Http\Controllers\client\VoucherController;
use App\Http\Controllers\admin\DoashboardController;
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




Route::get('Allbanner',[mainController::class,'getAllproduct']);
Route::get('GetListFeaturedProducts',[mainController::class,'GetListFeaturedProducts']);
Route::get('ShopbyCategories',[mainController::class,'ShopbyCategories']);
Route::get('Bannersecondary',[mainController::class,'Bannersecondary']);

Route::get('Sreachproduct',[SearchProductController::class,'GetAllProduct']);
Route::get('productVariant/{id}',[AllVariantController::class,'GetAllVariantProduct']);

Route::get('TotalOrdersPendingConfirmation',[DoashboardController::class,'TotalOrdersPendingConfirmation']);
Route::get('TotalConfirmedOrders',[DoashboardController::class,'TotalConfirmedOrders']);
Route::get('TotalOrdersInTransit',[DoashboardController::class,'TotalOrdersInTransit']);
Route::get('TotalCancelledOrders',[DoashboardController::class,'TotalCancelledOrders']);

Route::get('getRealTimeRevenue',[DoashboardController::class,'getRealTimeRevenue']);

Route::post('checkPassword',[mainController::class,'checkPassword']);

Route::get('CountActiveUsers',[DoashboardController::class,'CountActiveUsers']);
Route::get('CountOrderInOneDay',[DoashboardController::class,'CountOrderInOneDay']);


Route::get('check-timezone', function () {
    return response()->json([
        'Laravel config timezone' => config('app.timezone'),
        'PHP default timezone' => date_default_timezone_get(),
        'Carbon default' => \Carbon\Carbon::now()->toDateTimeString(),
        'Explicit VN' => \Carbon\Carbon::now('Asia/Ho_Chi_Minh')->toDateTimeString(),
    ]);
});






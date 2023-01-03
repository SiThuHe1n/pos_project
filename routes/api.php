<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductStockController;
use App\Http\Controllers\SubcategoryController;
use App\Http\Controllers\UnittypeController;



use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('brand', BrandController::class);
Route::apiResource('category', CategoryController::class);
Route::apiResource('subcategory', SubcategoryController::class);
Route::apiResource('unittype', UnittypeController::class);
Route::apiResource('product', ProductController::class);
Route::apiResource('productstock', ProductStockController::class);

Route::post('/deletestock/{id}', [ProductStockController::class, 'dodelete']);
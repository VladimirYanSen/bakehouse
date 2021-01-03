<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| api Routes
|--------------------------------------------------------------------------
|
| Here is where you can register api routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your api!
|
*/

Route::apiResource('category', 'api\CategoryApiController');
Route::apiResource('merchant', 'api\MerchantApiController');
Route::apiResource('price', 'api\PriceApiController');
Route::apiResource('product', 'api\ProductApiController');

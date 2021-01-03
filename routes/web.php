<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//Route::get('/category/add', function () {
//    return view('pages.category.add');
//})->name('add_category');
//Route::get('/merchant/add', function () {
//    return view('pages.merchant.add');
//})->name('add_merchant');


Auth::routes();

Route::get('/home', 'api\CategoryController@index')->name('home')->middleware('auth');

Route::group(['middleware' => 'auth'], function () {
    Route::get('icons', ['as' => 'pages.icons', 'uses' => 'PageController@icons']);
    Route::get('maps', ['as' => 'pages.maps', 'uses' => 'PageController@maps']);
    Route::get('notifications', ['as' => 'pages.notifications', 'uses' => 'PageController@notifications']);
    Route::get('rtl', ['as' => 'pages.rtl', 'uses' => 'PageController@rtl']);
    Route::get('tables', ['as' => 'pages.tables', 'uses' => 'PageController@tables']);
    Route::get('typography', ['as' => 'pages.typography', 'uses' => 'PageController@typography']);
    Route::get('upgrade', ['as' => 'pages.upgrade', 'uses' => 'PageController@upgrade']);

//    Route::resource('category', 'api\CategoryController');
//    Route::resource('merchant', 'api\MerchantController');
//    Route::resource('product', 'api\ProductController');
//    Route::resource('price', 'api\PriceController');
});

Route::group(['middleware' => 'auth'], function () {
    Route::resource('user', 'UserController', ['except' => ['show']]);
    Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
    Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
    Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);


});




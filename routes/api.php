<?php

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
//AUTH
Route::post('auth/register','API\AuthController@register');
Route::post('auth/login','API\AuthController@login');

//LOGIN
Route::post('/bill','API\BillController@store');

//PRODUCT
Route::get('/product','API\ProductController@product');
Route::get('/category','API\ProductController@category');
Route::get('/product/{id}','API\ProductController@detail');

//BILL
Route::post('auth/login','API\AuthController@login');

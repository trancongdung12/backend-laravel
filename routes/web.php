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
Route::get('/','Admin\DashboardController@index');
//Category
Route::get('admin/category','Admin\CategoryController@index');
Route::get('admin/category/{id}/edit','Admin\CategoryController@edit');
Route::post('admin/category','Admin\CategoryController@store');
Route::delete('admin/category/{id}','Admin\CategoryController@destroy');
Route::patch('admin/category','Admin\CategoryController@update');

//Product
Route::get('admin/product','Admin\ProductController@index');
Route::get('admin/product/{id}/edit','Admin\ProductController@edit');
Route::post('admin/product','Admin\ProductController@store');
Route::delete('admin/product/{id}','Admin\ProductController@destroy');
Route::patch('admin/product/','Admin\ProductController@update');

//Message
Route::get('admin/message','Admin\MessageController@index');
Route::get('admin/message/{id}','Admin\MessageController@showMessage');
Route::post('admin/message','Admin\MessageController@sendMessage');

//Bill
Route::get('admin/bill','Admin\billController@index');

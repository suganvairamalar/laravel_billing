<?php

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

/*Route::get('/', function () {
    return view('welcome');
});*/
Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/date', function(){
	return view('date');
})->name('date');


Route::get('/categories','CategoryController@index')->name('category.index');
Route::post('/category_add_data','CategoryController@insert')->name('category.insert');
Route::post('/category_update_data','CategoryController@update')->name('category.update');
Route::get('/category_delete_data/{id}','CategoryController@delete')->name('category.delete');

Route::get('/products','ProductController@index')->name('product.index');
Route::get('/find_category_name','ProductController@find_category_name')->name('product.find_category_name');
Route::get('/product_add_data','ProductController@insert')->name('product.insert');
Route::get('/product_edit_data/{id}','ProductController@edit')->name('product.edit');
Route::post('/product_update_data','ProductController@update')->name('product.update');
Route::get('/product_delete_data/{id}/','ProductController@delete')->name('product.delete');

Route::get('/orders','OrderController@index')->name('order.index');
Route::get('/orders_product_fetch','OrderController@order_product_fetch')->name('order.order_product_fetch');
Route::post('/order_add_data','OrderController@insert')->name('order.insert');
Route::get('/order_edit_data/{id}','OrderController@edit')->name('order.edit');
Route::post('/order_update_data','OrderController@update')->name('order.update');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

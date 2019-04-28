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



route::get('/test',"test@display");
route::get('/',"master@front_page");



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/add-category','categorycontroller@category')->middleware('userauth');
Route::post('/save-category','categorycontroller@addcategory');
Route::get('/product-info','categorycontroller@productinfo');
Route::post('/pinfo','categorycontroller@pinfo');
Route::get('/manage-category', 'categorycontroller@managecategory');
Route::get('/editc/{e_id}', 'categorycontroller@edit');
Route::post('/update-category', 'categorycontroller@update_category');
Route::get('/delete/{e_id}','categorycontroller@delete_category');
Route::get('/editproduct/{e_id}','categorycontroller@editproduct');
Route::post('/update-product','categorycontroller@upadateproduct');
Route::get('/showproduct','shopping_cart_controller@show_product');
Route::post('/add_into_cart','shopping_cart_controller@addintocart');
Route::get('/cart_show','shopping_cart_controller@showcartproduct');
Route::post('/update_cart','shopping_cart_controller@updatecart');
Route::get('/remove_cart_product/{rowId}','shopping_cart_controller@removeproduct');
Route::get('/csv','csv_controller@csvpage');
Route::post('/csv-input','csv_controller@csvinput');
Route::get('exportclients','csv_controller@exportclients');
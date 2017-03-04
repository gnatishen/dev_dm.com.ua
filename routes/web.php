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

Route::get('/', 'IndexController@index');

Route::get('resizeImage', 'ImageController@resizeImage');
Route::post('resizeImagePost',['as'=>'resizeImagePost','uses'=>'ImageController@resizeImagePost']);


Route::get('admin/slide/add', 'SliderController@add');
Route::post('admin/slide/addPost',['as'=>'addPost','uses'=>'SliderController@addPost']);
Route::delete('admin/slide/delete/{slide}', function( \App\Slide $slide ) {
	$slide->delete();
	return redirect('admin/slide/add');
})->name('slideDelete');


Route::get('admin/categories', 'CategoryController@index');
Route::get('admin/categories/import', 'CategoryController@import');
Route::get('catalog/{id}','CategoryController@show');


//products
Route::get('admin/product/add', 'ProductController@add');
Route::post('admin/product/addPost',['as'=>'addPost','uses'=>'SliderController@addPost']);
Route::delete('admin/product/delete/{product}', function( \App\Product $product ) {
	$product->delete();
	return redirect('products');
})->name('productDelete');


//Route::get('admin/product/import', 'ProductController@import');
//Route::get('admin/product/img_resize','ProductController@imgResize');
Route::get('ru/content/{url_latin}','ProductController@show');

//taxons
Route::get('admin/taxons', 'TaxonController@index');
//Route::get('admin/taxon/import', 'TaxonController@import');

//cart
Route::get('cart','CartController@show');
Route::post('cart/add', [
		'as'=>'cartAdd',
		'uses'=>'CartController@cartAdd']);
Route::delete('cart/itemDelete/{rowId}', [
	'as' => 'cartItemDelete',
	'uses' => 'CartController@itemDelete'
	]);
//Order
Route::post('order/add', [
		'as'=>'orderAdd',
		'uses'=>'OrderController@orderAdd']);

Route::post('order/addCart', [
		'as'=>'orderAddCart',
		'uses'=>'OrderController@orderAddCart']);
Route::get('admin/orders', 'OrderController@index');
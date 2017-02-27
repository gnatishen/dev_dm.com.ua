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
Route::get('admin/product/import', 'ProductController@import');
Route::get('products', 'ProductController@index');

Route::get('admin/product/img_resize','ProductController@imgResize');
Route::get('product/{id}','ProductController@show');

//taxons
Route::get('admin/taxons', 'TaxonController@index');
Route::get('admin/taxon/import', 'TaxonController@import');

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


Route::get('admin/categories', 'CategoryController@show');
Route::get('admin/categories/import', 'CategoryController@import');
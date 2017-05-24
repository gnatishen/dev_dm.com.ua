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

Route::group(['middleware' => 'App\Http\Middleware\AdminMiddleware'], function()
{
	Route::get('admin',function(){
		return view('admin-page');
	});
	//admin slides
	Route::get('admin/slide/add', 'SliderController@add');
	Route::post('admin/slide/addPost',['as'=>'addPost','uses'=>'SliderController@addPost']);
	Route::delete('admin/slide/delete/{slide}', function( \App\Slide $slide ) {
		$slide->delete();
		return redirect('admin/slide/add');
	})->name('slideDelete');

	//admin categories
	Route::get('admin/categories', 'CategoryController@index');
	Route::get('admin/categories/import', 'CategoryController@import');
	Route::get('admin/categories/edit', 'CategoryController@edit');

	//admin products
	Route::get('admin/product/create', 'ProductController@create');
	Route::post('admin/product/create',['as'=>'productCreate','uses'=>'ProductController@createPost']);

	Route::get('admin/product/update/{id}', 'ProductController@update');
	Route::post('admin/product/update',['as'=>'productUpdate','uses'=>'ProductController@updatePost']);

	Route::delete('admin/product/delete/{product}', function( \App\Product $product ) {
		$product->delete();
		return redirect('admin/products');
	})->name('productDelete');

	Route::get('admin/products','ProductController@index');

	Route::get('admin/products/manage-images','ProductController@manageImages');
	Route::get('admin/product/delete/image', 'ProductController@deleteImage')->name('deleteImage');	

	//export to excel
	Route::get('admin/products/exportToExcel','ProductController@exportToExcel');

	//import with excel
	Route::get('admin/products/importWithExcel', function() 
		{
			return view('products.importWithExcelForm');
		});
	Route::post('admin/products/importWithExcelPost',['as'=>'importWithExcelPost','uses'=>'ProductController@importWithExcelPost']);


	//import products
	//Route::get('admin/product/import', 'ProductController@import');

	//taxons
	Route::get('admin/taxons', 'TaxonController@index');

	//orders
	Route::get('admin/orders', 'OrderController@index');

	//pages
	Route::get('admin/pages', 'PagesController@index');
	Route::post('admin/page/create',['as'=>'pageCreate','uses'=>'PagesController@create']);

	Route::get('admin/page/update/{id}',['as'=>'pageUpdate','uses'=>'PagesController@update']);
	Route::post('admin/page/update',['as'=>'pageUpdatePost','uses'=>'PagesController@updatePost']);

	Route::delete('admin/page/delete/{page}', function( \App\Page $page ) {
		$page->delete();
		return redirect('admin/pages');
	})->name('pageDelete');

	//seoCreate
	Route::post('admin/seo/create',['as'=>'seoCreate','uses'=>'SeoController@create']);
	Route::post('admin/seo/update',['as'=>'seoUpdate','uses'=>'SeoController@update']);

	//export photos to folder
	
	Route::get('admin/products/exportallphotos','ProductController@exportAllPhotos');

	//promo
	Route::get('admin/promo/admin', 'PromoController@admin');
	Route::get('admin/promo/create', 'PromoController@create');
	Route::post('admin/promo/create',['as'=>'promoCreate','uses'=>'PromoController@createPost']);

	Route::delete('admin/promo/delete/{promo}', function( \App\Promo $promo ) {
		$promo->delete();
		return redirect('admin/promo/admin');
	})->name('promoDelete');

});

//redirect table delete cateries
Route::get('/catalog/93',function()
	{

		return redirect('/catalog/89');
	});
Route::get('/catalog/94',function()
	{

		return redirect('/catalog/89');
	});



Route::get('/', 'IndexController@index')->name('home');
Route::get('/ru', function () 
	{

		return redirect('/');
	});
Route::get('/uk', function () 
	{

		return redirect('/');
	});
//Route::get('resizeImage', 'ImageController@resizeImage');
//Route::post('resizeImagePost',['as'=>'resizeImagePost','uses'=>'ImageController@resizeImagePost']);

Route::get('catalog/{id}','CategoryController@show')->name('category');
Route::get('catalog/{url_latin}','CategoryController@showByLatin')->name('category_latin');
Route::get('ru/catalog/{url_latin}',function($url_latin)
	{

		return redirect('catalog/'.$url_latin);
	});
Route::get('uk/catalog/{url_latin}',function($url_latin)
	{

		return redirect('catalog/'.$url_latin);
	});

//Route::get('admin/product/import', 'ProductController@import');
//Route::get('admin/product/img_resize','ProductController@imgResize');


Route::get('content/{url_latin}','ProductController@show');
Route::get('ru/content/{url_latin}',function($url_latin)
	{

		return redirect('content/'.$url_latin);
	});
Route::get('uk/content/{url_latin}',function($url_latin)
	{

		return redirect('content/'.$url_latin);
	});
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



Breadcrumbs::register('home', function($breadcrumbs) {
    $breadcrumbs->push('Home', route('home'));
});

Breadcrumbs::register('category', function($breadcrumbs, $category) {
    if ( $category->parent_id != 0 ) {
    	$category_p = APP\Category::all()->where('id', $category->parent_id)->first();
        $breadcrumbs->push($category_p->title, route('category', $category_p->id));
    }
    else
        $breadcrumbs->parent('home');

    $breadcrumbs->push($category->title, route('category', $category->id));
});


//static pages routes
Route::get('page/{url_latin}', 'PagesController@show');


Auth::routes();
Route::get('register', function(){
	return redirect('/login');
});
Route::get('/home', 'HomeController@index');

Route::post('searchPost',['as'=>'searchPost','uses'=>'SearchController@searchPost']);

Route::get('/promo/{id}',['as'=>'promoCart','uses'=>'PromoController@show']);

Route::post('/mailing/create',['as'=>'mailingAddPost','uses'=>'MailingController@addPost']);




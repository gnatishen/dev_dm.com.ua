<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;

class UrlController extends Controller
{
    
	public function parseUrl($url) {

		$linkArray = explode('/', $url);
		$topCategories = Category::where('parent_id',0)->get();
		
		foreach ($topCategories as $key => $value) {
			if ( end($linkArray) == $value->url_latin ) {

				return app('App\Http\Controllers\CategoryController')->show($value->id);
			}
		}
		if ( $product = Product::where('url_latin', end($linkArray))->first() ) 
		{
			return app('App\Http\Controllers\ProductController')->show($product);

		}

		if ( $subcategory = Category::where('url_latin', end($linkArray))->first() )
		{
			return app('App\Http\Controllers\CategoryController')->show($subcategory->id);
		}

		
		return view('errors.404');
	}

}

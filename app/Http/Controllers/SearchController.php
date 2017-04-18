<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class SearchController extends Controller
{
    
    public function searchPost( Request $request ) 
    {	
    	$col = mb_strlen($request->search);

    	if ( $col >= 4 && $col <= 5 && is_numeric($request->search) ) {
    		$products = Product::where('id',$request->search)->get();
    	}
    	else {
    		$products = Product::where('title','like','%'.$request->search.'%')->get();
    	}


    	return view('search')
    				->with('products', $products);
    }
}

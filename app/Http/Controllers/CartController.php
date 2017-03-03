<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use \App\Product;

class CartController extends Controller
{
    public function show() {

    	return view('cart');
    }
    public function cartAdd(Request $request) {

    	//Cart::destroy();
    	$product = Product::where('id', $request->product_id)->first();

    	$cartItem = Cart::add($request->product_id,$product->title, $request->product_qty,$product->price);

    	return redirect('/cart');
    }

    public function itemDelete(Request $request) {


    	Cart::remove($request->rowId);

    	return redirect('/cart');
    }
}

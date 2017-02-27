<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;

class CartController extends Controller
{
    public function show() {

    	Cart::add('1','Bots', 1, 9.99);
		#Cart::add('1239ad0', 'Product 2', 2, 5.95, ['size' => 'large']);
    	dump(Cart::content());die;
    	return view('cart');
    }
}

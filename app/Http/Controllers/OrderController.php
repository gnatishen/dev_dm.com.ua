<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Input;
use Cart;
use App\Order;

class OrderController extends Controller
{
    public function orderAdd(Request $request) {

    	$this->validate($request, [
	    	'phone' => 'required|min:15',
        ]);

    	$message = "<p>Ваш заказ зарегистрирован, в ближайшее время с вами свяжется наш менеджер</p>
    		<p>$request->phone</p>";

    	return response()->json($message);
    }

    public function orderAddCart(Request $request) {

    	$cartItems = Cart::content();
    	$string = '';

    	foreach ($cartItems as $cartItem) {
    		$string = $string.$cartItem->id.'; '.$cartItem->name.'; '.$cartItem->qty.'; '.$cartItem->price.'; '.$cartItem->total.'|||';
    	}
    	$order = new Order;
    	$order->fill(array(
    		'order_id' => str_random(7),
    		'fio' => $request->fio,
    		'phone' => $request->phone,
    		'city' => $request->city,
    		'pochta' => $request->pochta,
    		'description' => $request->body,
    		'products'=> substr($string,0,-3),
    		'total_price'=>Cart::total(),
    		'status' => 'Оформлен'
    		));

    	$order->save();

    	Cart::destroy();

    	return redirect("/");
    }

    public function index() {

    	$orders = Order::all();


    	return view('orders')
    		->with('orders', $orders);
    }
}

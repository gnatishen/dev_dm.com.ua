<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Input;
use Cart;
use Mail;
use App\Order;
use App\Product;

class OrderController extends Controller
{
    public function orderAdd(Request $request) {

    	$this->validate($request, [
	    	'phone' => 'required|min:15',
        ]);
        $product = Product::all()->where('id',$request->product_id)->first();
        $message = '<p> Артикл: '.$product->id.'</p><p> Заказ: '.$product->title.'</p><p> Номер телефона: '.$request->phone.'</p><p> Комментарий: '.$request->body.'</p>';

        Mail::send('mail-message-short', ['mess' => $message], function($message)
        {   
            $message->from('manager@grandmoto.com.ua', 'GrandMoto');
            $message->to('grandmoto@ukr.net')->subject('Новый заказ - 1 клик');
        });

    	$message_j = "<p>Ваш заказ зарегистрирован, в ближайшее время с вами свяжется наш менеджер</p>";

    	return response()->json($message_j);
    }

    public function orderAddCart(Request $request) {

    	$cartItems = Cart::content();
    	$string = '';

    	foreach ($cartItems as $cartItem) {
    		$string = $string.$cartItem->id.'; '.$cartItem->name.'; '.$cartItem->qty.'; '.$cartItem->price.'; '.$cartItem->total.'|||';
    	}
    	$order = new Order;
        $order_id = str_random(7);
    	$order->fill(array(
    		'order_id' => $order_id,
    		'fio' => $request->fio,
    		'phone' => $request->phone,
    		'city' => $request->city,
    		'pochta' => $request->pochta,
    		'description' => $request->body,
    		'products'=> substr($string,0,-3),
    		'total_price'=>Cart::total(),
    		'status' => 'Оформлен'
    		));

    	if ( $order->save() ) {
            Cart::destroy();


            Mail::send('mail-message', ['order' => $order], function($message)
            {   
                $message->from('manager@grandmoto.com.ua', 'GrandMoto');
                $message->to('grandmoto@ukr.net')->subject('Новый заказ');
            });

            $message = '<h4>Спасибо за заказ. </h4><br><br> Номер вашего заказа - <h4>'.$order_id.'</h4><br>В ближайшее время с вами свяжется наш менеджер';
        } 	

    	return view('cart-confirm')
                ->with('message', $message);
    }

    public function index() {

    	$orders = Order::orderBy('updated_at', 'desc')->paginate(50);
        
    	return view('orders')
    		->with('orders', $orders);
    }
}

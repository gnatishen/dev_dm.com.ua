<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Guestbook;

class GuestbookController extends Controller
{
    public function index() {
    	$posts = Guestbook::orderBy('id', 'desc')->where('parent_id',0)->paginate(15);
    	$answers = Guestbook::where('parent_id','>',0)->get();

    	return view('guestbook.index')
    			->with('posts', $posts)
    			->with('answers',$answers);
    }

	public function create( Request $request ) {
        $this->validate($request, [
            'g-recaptcha-response' => 'required|captcha'
        ]);
		$post = new Guestbook;
		$post->fill(array(
            'name' => $request->name,
            'body' => $request->body
            ));
		$post->save();

        return redirect()->back()->with('message', 'Спасибо за ваш отзыв. Мы ценим ваше мнение о нас.');
	}
    public function Admincreate( Request $request ) {

        $post = new Guestbook;
        $post->fill(array(
            'parent_id' => $request->parent_id,
            'name'=> 'Владелец',
            'body'=> $request->body
            ));
        $post->save();

        return redirect()->back()->with('message', 'Спасибо за ваш отзыв. Мы ценим ваше мнение о нас.');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mailing;

class MailingController extends Controller
{
    public function addPost(Request $request) {
    	$this->validate($request, [
        	'email' => 'required|email',
    	]);



    	if ( Mailing::where('email', $request->email)->count() == 0 )
    	{
    		$mail = new Mailing;

    		$mail->fill(array(
    			'email'=>$request->email,
    			));
    		$mail->save();
    		$message = "Ваш E-mail успешно добавлен в рассылку. Спасибо.";
    	}
    	else $message = "Этот E-mail уже есть в списке рассылки. Спасибо.";

    	return redirect()->back()->with('message', $message);
    }
}

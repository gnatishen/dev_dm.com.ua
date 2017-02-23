<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slide;

class IndexController extends Controller
{
    public function index() {

    	$slides = Slide::where('active','1')->get();
    	
    	return view('index')
    		->with('slides', $slides);

    }
}

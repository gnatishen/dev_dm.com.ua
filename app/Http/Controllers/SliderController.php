<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Image;

class SliderController extends Controller
{
    public function add() {
    	return view('sliderAddForm');
    }
}

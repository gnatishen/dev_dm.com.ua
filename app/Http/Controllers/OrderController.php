<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Input;


class OrderController extends Controller
{
    public function orderAdd(Request $request) {

    	return response()->json([$request->phone]);
    }
}

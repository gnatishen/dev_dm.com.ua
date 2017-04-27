<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Seo;
use App\Category;

class SeoController extends Controller
{

    public function create( Request $request )
    {
    	$seoText = new Seo;

    	$seoText->fill(array(
    		'body' => $request->body,
    		'tid' => $request->category_id
    		));
    	$seoText->save();

        return redirect('/catalog/'.$request->category_id);
    }    

      
    public function update( Request $request )
    {
    	$seoText = Seo::all()->where('tid', $request->category_id)->first();

    	$seoText->fill(array(
    		'body' => $request->body
    		));
    	$seoText->save();

        return redirect('/catalog/'.$request->category_id);
    }


}

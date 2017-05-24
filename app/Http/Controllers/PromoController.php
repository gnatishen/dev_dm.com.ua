<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Promo;
use App\Product;
use Image;
use File;
use DB;

class PromoController extends Controller
{

    private function imgResize($image, $width, $height, $name ) {

        ini_set('max_execution_time', 3600);
        ini_set('memory_limit','500M');


        $destinationPath = public_path('images/promo/'.$name);
        $realPath = public_path('images/promo/original');

        $img = Image::make($realPath.'/'.$image);
        $img->resize($width, $height, function ($constraint) {
                                     $constraint->aspectRatio();
                                     })
            ->save($destinationPath.'/'.$image);

     return true;
    }

    public function create() 
    {

    	return view('promo.create');
    }

    public function createPost (Request $request) {
        $promo = new Promo;

            
        $destinationPath = public_path('images/promo/original');
        $filename = substr( md5(rand()), 0, 5);
        $request->image->move($destinationPath, $filename);

        $this->imgResize($filename, '120', '120', 'catalog' );
        $this->imgResize($filename, '90', '90', 'carousel-small' );
        $this->imgResize($filename, '500', '500', 'cart' );
        $this->imgResize($filename, '800', '600', 'large' );
        $promo->image = $filename;

        //dump($product);die;
        $promo ->fill(array(
                  'title' => $request->title,
                  'body' => $request->body,
                  'price' => $request->price,
                  'image'=> trim($promo->image)
                  ));
        $promo->save();
        $product_ids = explode(' ', $request->product_ids);
        foreach ($product_ids as $key => $product_id) {
        	DB::table('promo_product')->insert(
    			['promo_id' => $promo->id, 'product_id' => $product_id]
			);
        }

        Return redirect('/admin/promo/admin');

    }


    public function admin()
    {
        $promos = Promo::all();



        return view('promo.admin')
                ->with('promos', $promos);
    }


    public function index()
    {
        $promos = Promo::all();



        return view('blocks.actions')
                ->with('promos', $promos);
    }

    public function show($id) {
    	$promo = Promo::find($id);
    	$articles = DB::table('promo_product')->where('promo_id', '=', $id)->get();

    	$images = '';
    	foreach ($articles as $key => $article) {
    		$product = Product::find($article->product_id);
    		$images = $images.$product->images.' ';
    	}

    	return view('promo.cart')
    		->with('promo', $promo)
    		->with('images', trim($images));

    }
}

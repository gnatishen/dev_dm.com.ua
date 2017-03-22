<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Product;
use App\Category;
use Image;
use File;

class ProductController extends Controller
{
    
    public function showImage($id) {
        $product = Product::select('images')->where('id',$id)->first();

        $img = explode(" ",$product->images);
        
        return $img[0];
    }

    public function deleteImage(Request $request) {

        $product = Product::find($request->product_id);
        $img_path = '/var/www/grandMotoLara/public/images';

        $images = explode(" ",$product->images);

        unset($images[array_search($request->image, $images)]);
        $images = implode(" ",$images);

        $message = "Успешно удален $request->image из продукта $product->title";

        $product->fill(array(
            'images' => $images
            ))->save();

        return response()->json($message);
    }

	public function show($url_latin) {

       $product = Product::all()->where('url_latin',$url_latin)->first();
        $category = Category::all()->where('id', $product->category_id)->first();      
       
       return view('product-cart')
       			->with('product',$product)
                ->with('category', $category);

    }

    public function manageImages() {

        $products = Product::paginate(50);

        return view('manage-images')->with(compact('products'));

    }

    public function index()
    {
        $products = Product::paginate(50);

        return view('products')->with(compact('products'));
    }
    public function create()
    {
        return view('create-product');
    }    

    public function update($id)
    {
        $product = Product::find($id);
        return view('edit-product')->with(compact('product'));
    }

    //FUNCTION RESIZE ALL IMAGES FROM OLD SHOP

    // public function imgResize() {

    // 	$images = Product::select('images')->get()->toArray();
    // 	ini_set('max_execution_time', 3600);
    // 	ini_set('memory_limit','500M');

    // 	foreach ($images as $image) {
    // 		if ( $image['images'] ) {
    // 			$images = explode(' ', $image['images']);
    // 			foreach ($images as $image) {
    // 				$destinationPath = public_path('images/products/carousel-small');
    // 				$realPath = public_path('images/products/original');

    // 				$img_name = $image;
    // 				if (!File::exists($realPath.'/'.$image)) {
    // 					$img_name = 'no-photo.png';
    // 				}

    //     			$img = Image::make($realPath.'/'.$img_name);
    //     			$img->resize(90, 90, function ($constraint) {
		  //   						$constraint->aspectRatio();
				// 					})
    //     			->save($destinationPath.'/'.$image);
    //     			print "$image <br>";
    // 			}
    // 		}
    // 	}
    // 	$status = "ok";

    // 	return view('admin-page')->with("status", $status);
    // }


    //   !!!!!FUNCTION IMPORT PRODUCTS FROM OLD SHOP!!!!

    // public function import() {
    // 	$dbConnect = DB::connection('mysql2');
    // 	$products = $dbConnect->table('commerce_product')->where('type', 'accessory')->get();
    // 	//$products = $dbConnect->table('commerce_product')->get();

    // 	$product_col = 1;

    // 	foreach ($products as $product ) {
    // 		//$productUrlLatin = $dbConnect->table('url_alias')->where('source', 'taxonomy/term/'.$taxon->tid)->get()->toArray();
    // 		$error = TRUE;
    // 		if ( $product->type == 'zapchasti' ) {
    // 			$table = 'field_data_field_z_product';
    // 			$field = 'field_z_product_product_id';
    // 			$photos_table = 'field_data_field_z_photo';
    // 			$photos_column_fid = 'field_z_photo_fid';
    // 			$category_table = 'field_data_field_z_catalog';
    // 			$category_column = 'field_z_catalog_tid';
    // 			$product_type_id = 2; 			
    // 		}
    // 		if ( $product->type == 'accessory' ) {
    // 			$table = 'field_data_field_accessory_tovar';
    // 			$field = 'field_accessory_tovar_product_id';
    // 			$photos_table = 'field_data_field_accessory_photos';
    // 			$photos_column_fid = 'field_accessory_photos_fid';
    // 			$category_table = 'field_data_field_accessory_catalog';
    // 			$category_column = 'field_accessory_catalog_tid';
    // 			$product_type_id = 1;
    // 		}

    // 		//get node id
    // 		$product->nodeId = $dbConnect->table($table)
    // 						->where($field, $product->product_id)
    // 						->get()
    // 						->toArray();
    // 		if ( $product->nodeId ) {
    // 			$product->nodeId = $product->nodeId[0]->entity_id;
    // 			$error = FALSE;
    // 		}
    		
    // 		if ( $error == False) { 
	   //  		//get body product
	   //  		$product->body = $dbConnect->table('field_data_body')
	   //  						->where('entity_id',$product->nodeId)
	   //  						->get()
	   //  						->first();

	   //  		if ( $product->body ) {
	   //  			$product->body = $product->body->body_value;
	   //  		}

	   //  		//field_data_commerce_price
	   //  		$product->price = $dbConnect->table('field_data_commerce_price')
	   //  					->where('entity_id',$product->product_id)
	   //  					->get()
	   //  					->first();
	   //  		if ( $product->price ) {
	   //  			$product->price = round($product->price->commerce_price_amount /100 * 29.50, 0, PHP_ROUND_HALF_UP);
	   //  		}

	   //  		$images_fids = $dbConnect->table($photos_table)
	   //  						->where('entity_id',$product->nodeId)
	   //  						->get();

	   //  		$images_str = '';
	   //  		foreach ($images_fids as $image_fid) {

	   //  			$images_str = $images_str.' '.$dbConnect->table('file_managed')
	   //  						->where('fid', $image_fid->$photos_column_fid )
	   //  						->get()
	   //  						->first()
	   //  						->filename;
	   //  		}
	   //  		$product->images = trim($images_str);

	   //  		//stock
				// $stock = $dbConnect->table('field_data_commerce_stock')
	   //  					->where('entity_id',$product->product_id)
	   //  					->get()
	   //  					->first();

	   //  		if ( $stock->commerce_stock_value > 1 ) {
	   //  			$product->stock = 1;
	   //  		}
	   //  		else { $product->stock = 2; }

	   //  		//url latin
	   //  		$productUrlLatin = $dbConnect->table('url_alias')
	   //  						->where('source', 'node/'.$product->nodeId)
	   //  						->get()
	   //  						->first();
	   //  		$urlLatin = explode('/',$productUrlLatin->alias);
    // 			$product->url_latin = array_slice($urlLatin, -1)[0];

    // 			//category 
    // 			$category_id = $dbConnect->table($category_table)
	   //  			->where('entity_id',$product->nodeId)
	   //  			->get()
	   //  			->first();
	   //  		if ( $category_id ) {
	   //  			$product->category_id = $category_id->$category_column;
	   //  		}

	   //  		$product_tmp = new Product;
	   //  		$product_tmp->fill(array(
	   //  			'id' => $product->nodeId,
	   //  			'product_type_id' =>  $product_type_id,
	   //  			'category_id' => $product->category_id,
	   //  			'title' => $product->title,
	   //  			'body' => $product->body,
	   //  			'price' => $product->price,
	   //  			'url_latin' => $product->url_latin,
	   //  			'attributes' => '',
	   //  			'stock' => $product->stock,
	   //  			'images'=> $product->images
	   //  			));
	   //  		if ( $product_tmp->save() ) {
	   //  			echo "$product->nodeId - $product->title ok";
	   //  		}

    // 		}
    // 		else {
    // 			$product = FALSE;
    // 		}


    // 		//dump($product_tmp);
    // 		//if ( $product_col == '1') {
    // 		//	die;
    // 		//}

    // 		$product_col++;
    //     }

    // 	return 'ok';
    // }

}

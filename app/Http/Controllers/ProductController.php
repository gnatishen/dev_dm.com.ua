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

       if ( !$product = Product::all()->where('url_latin',$url_latin)->first() ) {

            return view('errors.404');
       }
        $category = Category::all()->where('id', $product->category_id)->first();      
       
       return view('product-cart')
       			->with('product',$product)
                ->with('category', $category);

    }

    public function manageImages() {

        $products = Product::paginate(50);

        return view('manage-images')->with(compact('products'));

    }


    //admin pages
    private function buildTree(array $elements, $parentId = 0, $level = 0) {
        $branch = array();
        $tree = array();
        $level++;
        foreach ($elements as $key => $element) {
            


            if ($element['parent_id'] == $parentId) {
                $tree[$element['id']] = $element['title'];
                $children = $this->buildTree($elements, $element['id'], $level );

                $element['level'] = $level;
                

                $branch[] = $element;
            }
            else {
                $tree[$key] = array(
                'id' => $element['id'],
                'title' => $element['title']
                );
            }
        }

        return $tree;
    }

    private function imgResize($image, $width, $height, $name ) {

        ini_set('max_execution_time', 3600);
        ini_set('memory_limit','500M');


        $destinationPath = public_path('images/products/'.$name);
        $realPath = public_path('images/products/original');

        $img = Image::make($realPath.'/'.$image);
        $img->resize($width, $height, function ($constraint) {
                                     $constraint->aspectRatio();
                                     })
            ->save($destinationPath.'/'.$image);

     return true;
    }

    public function index()
    {
        $products = Product::orderBy('id', 'desc')->where('product_type_id','1')->paginate(50);
        $categories = Category::all();

        return view('products.products')
                ->with(compact('products'))
                ->with('categories', $categories);
    }

    public function create()
    {
        $rows = Category::all()->toArray();
        $tree = $this->buildTree($rows);

        return view('products.create-product')
                ->with('categories', $tree);
    }    

    public function createPost (Request $request) {
        $product = new Product;
        
        $product->id = Product::orderBy('created_at', 'desc')->first()->id + 1;

        $uploadcount = 1;
        if ( $request->images ) {
            foreach($request->images as $image) {
            
                $destinationPath = public_path('images/products/original');
                $filename = $product->id.'-'.substr( md5(rand()), 0, 5);
                $image->move($destinationPath, $filename);
                $uploadcount ++;

                $this->imgResize($filename, '120', '120', 'catalog' );
                $this->imgResize($filename, '90', '90', 'carousel-small' );
                $this->imgResize($filename, '500', '500', 'cart' );
                $this->imgResize($filename, '800', '600', 'large' );
                $product->images = $product->images." ".$filename;
            }
        }


        //dump($product);die;
        $product ->fill(array(
                  'product_type_id' =>  '1',
                  'category_id' => $request->category_id,
                  'title' => $request->title,
                  'body' => $request->body,
                  'price' => $request->price,
                  'url_latin' => $request->url_latin,
                  'attributes' => '',
                  'stock' => $request->stock,
                  'images'=> trim($product->images)
                  ));
        $product->save();

        Return redirect('/admin/products');

    }


    public function update($id)
    {
        $product = Product::find($id);

        $rows = Category::all()->toArray();
        $tree = $this->buildTree($rows);

        return view('products.edit-product')
                ->with(compact('product'))
                ->with('categories', $tree);
    }

    public function updatePost (Request $request) {

        $product = Product::find($request->id);
        $uploadcount = 1;
        if ( $request->images ) {
            foreach($request->images as $image) {
            
                $destinationPath = public_path('images/products/original');
                $filename = $product->id.'-'.substr( md5(rand()), 0, 5);
                $image->move($destinationPath, $filename);
                $uploadcount ++;

                $this->imgResize($filename, '120', '120', 'catalog' );
                $this->imgResize($filename, '90', '90', 'carousel-small' );
                $this->imgResize($filename, '500', '500', 'cart' );
                $this->imgResize($filename, '800', '600', 'large' );
                $product->images = $product->images." ".$filename;
            }
        }


        //dump($product);die;
        $product ->fill(array(
                  'id' => $product->id,
                  'product_type_id' =>  $product->product_type_id,
                  'category_id' => $request->category_id,
                  'title' => $request->title,
                  'body' => $request->body,
                  'price' => $request->price,
                  'url_latin' => $request->url_latin,
                  'attributes' => '',
                  'stock' => $request->stock,
                  'images'=> trim($product->images)
                  ));
        $product->save();

        Return redirect('/admin/product/update/'.$request->id);

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
    //     $dbConnect = DB::connection('mysql2');
    //     $base_nodes = $dbConnect->table('node')->where('type', 'product')->get();

    //     $id = 11315;
    //     $count = 1;
    //     foreach ( $base_nodes as $base_node ) {
    //         $error = false;

    //         //get price
    //         $base_uc_product = $dbConnect->table('uc_products')->where('nid', $base_node->nid)->first();
            
    //          //url latin
    //         $productUrlLatin = $dbConnect->table('url_alias')
    //                             ->where('source', 'node/'.$base_node->nid)
    //                             ->get()
    //                             ->first();
    //         $urlLatin = explode('/',$productUrlLatin->alias);
    //         $urlLatin = array_slice($urlLatin, -1)[0];

    //         //catalog
    //         if ( !$base_field_data_taxonomy_catalog  = $dbConnect->table('field_data_taxonomy_catalog')
    //                                                         ->where('entity_id', $base_node->nid)
    //                                                         ->first() )
    //         {
    //             $error = true;
    //         }

    //         //stock
    //         if ( $base_field_data_field_nal = $dbConnect->table('field_data_field_nal')
    //                                                         ->where('entity_id', $base_node->nid)
    //                                                         ->first() ) 
    //         {
    //             if ( $base_field_data_field_nal->field_nal_value == 0 ) {
    //                 $stock = 2;
    //             }
    //             else {
    //                 $stock = 1;
    //             }
    //         }
    //         else {
    //             $stock = 3;
    //         }


    //         //body 
    //         if ( $base_field_data_body = $dbConnect->table('field_data_body')
    //                                                         ->where('entity_id', $base_node->nid)
    //                                                         ->first() ) 
    //         {
    //             $body = $base_field_data_body->body_value;
    //         }
    //         else 
    //         {
    //             $body = 'У этого товара нет описания';
    //         }

 


    //         //dump($base_node);
    //         //dump($urlLatin);
    //         //dump($base_field_data_taxonomy_catalog->taxonomy_catalog_tid);
    //         //dump($stock);
    //         //dump($base_field_data_body->body_value);
    //         //dump(trim($images_str));
    //         //dump($base_uc_product);die;
            

    //         if ( $error == false ) 
    //         {
            
    //             if ( !$product_new = Product::where('url_latin', $urlLatin)->first() ) {

    //                //images
    //                 $images_fids = $dbConnect->table('field_data_uc_product_image')
    //                                                                 ->where('entity_id', $base_node->nid)
    //                                                                 ->get()
    //                                                                 ->toArray();

    //                 $images_str = '';
    //                 $destinationPath = public_path('images/products/original');

    //                 foreach ($images_fids as $image_fid) {
    //                     $filename = $dbConnect->table('file_managed')
    //                                   ->where('fid', $image_fid->uc_product_image_fid )
    //                                   ->get()
    //                                   ->first()
    //                                   ->filename;

    //                     $filename_new = $id.'-'.substr( md5(rand()), 0, 5);
    //                     if ( file_exists('/var/www/grandmoto.com.ua/web/sites/default/files/styles/1024/public/'.$filename) ) {
    //                         copy('/var/www/grandmoto.com.ua/web/sites/default/files/styles/1024/public/'.$filename, $destinationPath.'/'.$filename_new);
    //                     }


    //                         // $this->imgResize($filename_new, '120', '120', 'catalog' );
    //                         // $this->imgResize($filename_new, '90', '90', 'carousel-small' );
    //                         // $this->imgResize($filename_new, '500', '500', 'cart' );
    //                         // $this->imgResize($filename_new, '800', '600', 'large' );                          


    //                     if ( file_exists( $destinationPath.'/'.$filename_new ) ) {
    //                         $images_str = $images_str.' '.$filename_new; 
    //                         $this->imgResize($filename_new, '120', '120', 'catalog' );
    //                         $this->imgResize($filename_new, '90', '90', 'carousel-small' );
    //                         $this->imgResize($filename_new, '500', '500', 'cart' );
    //                         $this->imgResize($filename_new, '800', '600', 'large' );           
    //                     }


    //                 }   
    //                 dump($images_str);

    //                 $product = new Product;

    //                 $product->fill(array(
    //                     'id' => $id,
    //                     'product_type_id' =>  '1',
    //                     'price' => round($base_uc_product->sell_price, 0, PHP_ROUND_HALF_UP),
    //                     'title' => $base_node->title,
    //                     'attributes' => '',
    //                     'url_latin' => $urlLatin,
    //                     'category_id' => $base_field_data_taxonomy_catalog->taxonomy_catalog_tid,
    //                     'stock' => $stock,
    //                     'body' => $body,
    //                     'images'=> trim($images_str)
    //                 ));
    //                 $product->save();
    //                 $count++;
    //                 $id++;
    //             }

    //         }

    //     }

    //     return $count;
    // }

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

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class CategoryController extends Controller
{

    public function import() {
    	$dbConnect = DB::connection('mysql2');
    	$categories = $dbConnect->table('taxonomy_term_data')->where('vid','2')->get();

    	foreach ($categories as $category ) {
    		$categoryParent = $dbConnect->table('taxonomy_term_hierarchy')->where('tid', $category->tid)->get()->toArray();
    		$categoryUrlLatin = $dbConnect->table('url_alias')->where('source', 'taxonomy/term/'.$category->tid)->get()->toArray();

    		$category->parent_id = $categoryParent['0']->parent;
    		$category->id = $category->tid;
    		$category->title = $category->name;
    		
    		$urlLatin = explode('/',$categoryUrlLatin['0']->alias);
    		$category->parent_id = array_slice($urlLatin, -1)[0];
    		//$category->parent = $categoryParent['0']['parent'];

    		dump($category);
    	}

    	return 'ok';
    }
}

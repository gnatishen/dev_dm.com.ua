<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Category;

class CategoryController extends Controller
{

    private function buildTree(array $elements, $parentId = 0, $level = 0) {
        $branch = array();
        $level++;
        foreach ($elements as $element) {
            if ($element['parent_id'] == $parentId) {
                $children = $this->buildTree($elements, $element['id'], $level );
                if ($children) {
                    $element['children'] = $children;
                }
                else {
                    $element['children']= array();
                }
                $element['level'] = $level;
                

                $branch[] = $element;
            }
        }

        return $branch;
    }

    public function show() {
        $rows = Category::all()->toArray();
        $tree = $this->buildTree($rows);


        
        return view('mainMenu')
            ->with('categories', $tree);
    }

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
    		$category->url_latin = array_slice($urlLatin, -1)[0];
    		//$category->parent = $categoryParent['0']['parent'];

            $category_tmp = new Category;
            $category_tmp->fill(array(
                'id' => $category->id,
                'title' => $category->title,
                'parent_id' => $category->parent_id,
                'weight' => $category->weight,
                'url_latin' => $category->url_latin
                ));

            $category_tmp ->save();
    		//dump($category);
            //die;
    	}
        
    	return 'ok';
    }
}

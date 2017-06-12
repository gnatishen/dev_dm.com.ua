<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Category;
use App\Product;
use App\Seo;

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

    public function index() {
        $rows = Category::all()->toArray();
        $tree = $this->buildTree($rows);


        
        return view('mainMenu')
            ->with('categories', $tree);
    }

    public function show($id) {
        $products = Product::all()->where('category_id',$id)->sortBy('stock')->toArray();
        if ( !$catalog = Category::all()->where('id',$id)->first() ) {
            Return redirect('/');
        }
        $childs = Category::all()->where('parent_id', $id);
        $category = Category::all()->where('id', $id)->first();

        if ( !$seo = Seo::all()->where('tid', $category->id)->first() ) $seo = false;

        return view('catalog-page')
            ->with('products', $products)
            ->with('catalog_name',$catalog->title)
            ->with('childs', $childs)
            ->with('category',$category)
            ->with('seo', $seo)
            ->with('title', $category->title);
    }

    public function showProductsChild($id) {
        $products = Product::orderBy('updated_at','Desc')->where('category_id',$id)->where('stock','1')->take(6)->get();

        return view('categories.block-childProducts')
                    ->with('products',$products);
    }

    public function showByLatin($url_latin) {

        if ( !$catalog = Category::all()->where('url_latin',$url_latin)->first() ) {
            Return redirect('/');
        }

        $products = Product::all()->where('category_id',$catalog->id)->sortBy('stock')->toArray();

        $childs = Category::all()->where('parent_id', $catalog->id);
        $category = Category::all()->where('id', $catalog->id)->first();

        return view('catalog-page')
            ->with('products', $products)
            ->with('catalog_name',$catalog->title)
            ->with('childs', $childs)
            ->with('category',$category);
    }

    public function edit()
    {

        $rows = Category::all()->toArray();
        $tree = $this->buildTree($rows);


        
        return view('categories.edit')
            ->with('categories', $tree);

    }

}

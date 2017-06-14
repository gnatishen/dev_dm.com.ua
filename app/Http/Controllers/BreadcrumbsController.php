<?php



namespace App\Http\Controllers;
use App\Category;
use App\Product;

use Illuminate\Http\Request;

class BreadcrumbsController extends Controller
{

    private function breadcrumbsCatalog($id, $breadcrumb = array(), $count = 0 ) {
        $taxon = Category::where('id',$id)->first();
       

        if ( $taxon->parent_id > 0 ) {

        	$breadcrumb[$count] = $taxon;
        	$count++;
           	return $this->breadcrumbsCatalog($taxon->parent_id, $breadcrumb, $count);

        }
        else
        {
        	$breadcrumb[$count] = $taxon;
        }

        

        
        return $breadcrumb;
    }

    public function breadcrumbs($id) {
    	$breadcrumb = $this->breadcrumbsCatalog($id);

    	$breadcrumbString = '';
    	$breadcrumb = array_reverse($breadcrumb);
    	$breadcrumbLast = array_pop($breadcrumb);
    	$link = '';

        foreach ( $breadcrumb as $key => $value) {
        	
        	$link = $link.'/'.$value->url_latin;

        	$breadcrumbString = $breadcrumbString.'<a href="'.$link.'">'.$value->title.'</a> / ';
        	

        }
        

        return $breadcrumbString.'<span class="breadcrumb-current">'.$breadcrumbLast->title.'</span>';
    }

    public function breadcrumbsCart($id) {
    	$breadcrumb = $this->breadcrumbsCatalog($id);

    	$breadcrumbString = '';
    	$breadcrumb = array_reverse($breadcrumb);

    	$link = '';

        foreach ( $breadcrumb as $key => $value) {
        	
        	$link = $link.'/'.$value->url_latin;

        	$breadcrumbString = $breadcrumbString.'<a href="'.$link.'">'.$value->title.'</a> / ';
        	

        }
        

        return $breadcrumbString;
    }

}

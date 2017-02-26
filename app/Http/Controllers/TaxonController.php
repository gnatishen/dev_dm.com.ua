<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Taxon;

class TaxonController extends Controller
{

    public function show() {

       $rows = Category::all()->get();
       
        return $rows;
    }

    public function import() {
    	$dbConnect = DB::connection('mysql2');
    	$taxons = $dbConnect->table('taxonomy_term_data')->where('vid','6')->get();

    	foreach ($taxons as $taxon ) {
    		$taxonUrlLatin = $dbConnect->table('url_alias')->where('source', 'taxonomy/term/'.$taxon->tid)->get()->toArray();

    		$taxon->id = $taxon->tid;
    		
    		$urlLatin = explode('/',$taxonUrlLatin['0']->alias);
    		$taxon->url_latin = array_slice($urlLatin, -1)[0];

    		if ( $taxon->name ) {

	            $taxon_tmp = new Taxon;
    	        $taxon_tmp->fill(array(
        		        'id' => $taxon->id,
                		'title' => $taxon->name,
                		'url_latin' => $taxon->url_latin,
                		'vocab_id' => '1' //vobabilty ID
                ));

            	$taxon_tmp ->save();
        	}
    	}
        
    	return 'ok';
    }
}
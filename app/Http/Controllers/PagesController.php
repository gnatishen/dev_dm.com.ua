<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Page;

class PagesController extends Controller
{
    
	public function show( $url_latin ) {

		if ( !$page = Page::where('url_latin', $url_latin)->first() ) return response()->view('errors.404', [], 404);



		Return view('pages.static-page')
			->with(array (
				'title' => $page->title,
				'body' => $page->body
				));
	}

	public function index() {

		$pages = Page::all();

		Return view('pages.admin-pages')
			->with("pages", $pages);
	}

	public function create( Request $request ) {

		$page = new Page;
		$page->fill($request->all());
		$page->save();

		Return back()
        	->with('success','Страница добавлена');
	}

	public function update($id) {

		$page = Page::find($id);


		Return view('pages.update-form')
			->with('page',$page);
	}

	public function updatePost (Request $request) {

		$page = Page::find($request->id);

		$page->fill($request->all());
		$page->save();

		Return redirect('/admin/pages');

	}



}

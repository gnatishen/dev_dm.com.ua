<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slide;
use Image;

class SliderController extends Controller
{
    public function add() {

    	$slides = Slide::all()->sortByDesc('active');

    	return view('sliderAddForm')->with('slides', $slides);
    }

    public function addPost(Request $request)
    {

	    $this->validate($request, [
	    	'title' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

	    
        $image = $request->file('image');
        $input['imagename'] = time().'.'.$image->getClientOriginalExtension();
  
        $destinationPath = public_path('images/uploads/slides/thumbnail');
        $img = Image::make($image->getRealPath());
        $img->resize(1920, 700, function ($constraint) {
		    $constraint->aspectRatio();
		})->save($destinationPath.'/'.$input['imagename']);

        $destinationPath = public_path('images/uploads/slides/thumbnail_small');
        $img = Image::make($image->getRealPath());
        $img->resize(100, 100, function ($constraint) {
		    $constraint->aspectRatio();
		})->save($destinationPath.'/'.$input['imagename']);

        $destinationPath = public_path('images/uploads/slides/original');
        $image->move($destinationPath, $input['imagename']);


        $data = $request->all();
        $data['image'] = $input['imagename'];

        $slide = new Slide;
        $slide->fill($data);

        $slide->save();



        return back()
        	->with('success','Слайд добавлен на главную');
        	
    }
}

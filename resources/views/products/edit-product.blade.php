@extends('layouts.admin-app')

@section('content')
	<h2>{{ $product->title }}</h2>
	<div class="admin-edit-product">
		<?php $images = explode(' ', $product->images); ?>
		<div class="product-images row">
				@foreach ($images as $image)
					<div class="image col-sm-2">
						<?php if ( $image == '' ) $image = 'nophoto.png' ?>
						<img src="/images/products/catalog/{{ $image }}">
						{!! Form::open(array('method'=>'POST', 'id'=>$image)) !!}
	                		<input class="product_id_h" type="hidden" name="product_id" value="{{$product->id}}">
	                		<input class="image_h" type="hidden" name="image" value="{{$image}}">
	                		<button type="button" class="btn-delete-img btn btn-danger btn-{{$image}}"> X </button>
	            		{!! Form::close() !!}
					</div>
				@endforeach			
		</div>


		{{ Form::model( $product, ['route' => ['productUpdate'], 'method' => 'post', 'role' => 'form', 'files' => true ] ) }}
			<input type="hidden" name="id" value="{{$product->id}}">
		    @include('products._fields-product')

		{{ Form::close() }}
	</div>

@endsection

@section('footer')

	{!! view('footer') !!}

@endsection



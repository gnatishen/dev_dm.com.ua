@extends('layouts.admin-app')

@section('slider')
	<div class="messages"></div>
@endsection
@section('content')
	<div class="admin-products-img">
		<div class="page-title"><h4>Все изображения продукции</h4></div>
		<div class="row">
			@foreach ( $products as $product )
				<?php 
					$images = explode(' ', $product->images); ?>
				@foreach ($images as $image)
					<div class="image col-sm-2">
						<?php if ( $image == '' ) $image = 'nophoto.png' ?>
						<img src="/images/products/catalog/{{ $image }}">
						{!! Form::open(array('method'=>'POST', 'id'=>$product->id)) !!}
	                		<input type="hidden" name="product_id" value="{{$product->id}}">
	                		<input type="hidden" name="image" value="{{$image}}">
	                		<button type="button" class="btn-delete-img btn btn-danger btn-{{$product->id}}"> X </button>
	            		{!! Form::close() !!}
					</div>
				@endforeach
			@endforeach	
		</div>
		{{ $products->links('vendor.pagination.bootstrap-4') }}	
	</div>
@endsection
@section('footer')
	{!! view('footer') !!}
@endsection

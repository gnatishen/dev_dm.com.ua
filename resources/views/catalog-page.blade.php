@extends('layouts.app')

@section('slider')

@endsection
@section('content')
	<div class="catalog-name">
		<h2>{{ $catalog_name }}</h2>
	</div>
	<div class="catalog-items">
		<div class="row">
			@foreach ($products as $product)
				<?php $image = explode(' ', $product['images'])?>
				<a href="/product/{{ $product['id'] }}">
					<div class="col-sm-2 product-item">
						<div class="image">
							<img src="/images/products/catalog/{{ $image[0] }}">
						</div>
						<div class="product-title"><h4>{{ $product['title'] }}</h4></div>
						<div class="product-price"><h3>{{ $product['price'] }} ГРН.</h3></div>
					</div>
				</a>
			@endforeach
		</div>
	</div>
@endsection
@section('footer')
	{!! view('footer') !!}
@endsection

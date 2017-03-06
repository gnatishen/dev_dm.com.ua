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
				<?php 
					$image = explode(' ', $product['images']);
					$class = '';
					$block = '';
				?>
				@if ( $product['stock'] != 1 )
					<?php 
						$class = 'out-stock';
						$block = '<div class="out-message">ПОД ЗАКАЗ</div>';
					?>
				@endif
				<a href="/ru/content/{{ $product['url_latin'] }}">
					<div class="col-sm-2 product-item {{ $class }}">
						<div class="image">
							<img src="/images/products/catalog/{{ $image[0] }}">
						</div>
						<div class="product-title"><h4>{{ $product['title'] }}</h4></div>
						<div class="product-price"><h3>{{ $product['price'] }} ГРН.</h3></div>
						{!! $block !!}
					</div>
				</a>
			@endforeach
		</div>
	</div>
@endsection
@section('footer')
	{!! view('footer') !!}
@endsection

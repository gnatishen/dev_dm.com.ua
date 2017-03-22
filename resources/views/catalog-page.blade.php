@extends('layouts.app')

@section('slider')
	<div class="breadcrumbs">
		{!! Breadcrumbs::render('category', $category) !!}
	</div>
@endsection
@section('content')

	<div class="catalog-page">
		<div class="catalog-name">
			<h2>{{ $catalog_name }}</h2>
		</div>
		@if ( count($childs) > 0 )
			
			<div class="child-block">
				<ul class="nav  nav-justified">
				@foreach ( $childs as $child )
					<li>
						<a href="/catalog/{{$child->id}}">
							{{ $child->title }}
						</a>
					</li>

				@endforeach
				</ul>
			</div>

		@endif
		<div class="catalog-items">
			<div class="row">
				@if ( count($products) > 0 )
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
									<?php if ( $image[0] == '' ) $image[0] = 'nophoto.png' ?>
									<img src="/images/products/catalog/{{ $image[0] }}" ALT="{{ $product['title'] }}" />
								</div>
								<div class="product-title"><h4>{{ $product['title'] }}</h4></div>
								<div class="product-price"><h3>{{ $product['price'] }} ГРН.</h3></div>
								{!! $block !!}
							</div>
						</a>
					@endforeach
				@else
					@if ( count($childs) == 0 )
						<div class="no-entry">
							Извините, но в даной категории пока нет товаров.
						</div>
					@endif
				@endif

			</div>
		</div>
	</div>
@endsection
@section('footer')
	{!! view('footer') !!}
@endsection

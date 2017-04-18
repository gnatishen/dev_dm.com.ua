@extends('layouts.app')

@section('content')
	<h2>Страница поиска</h2>
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
					<a href="/content/{{ $product['url_latin'] }}">
						<div class="col-sm-2 product-item {{ $class }}">
							<div class="image">
								<?php if ( $image[0] == '' ) $image[0] = 'nophoto.png' ?>
								<img src="/images/products/catalog/{{ $image[0] }}" ALT="{{ $product['title'] }}" />
							</div>
							<div class="product-title"><h4>{{ $product['title'] }}</h4></div>
							<div class="product-price"><h3>{{ $product['price'] }} ГРН.</h3></div>
							<?php
							 	if ( $user = Auth::user() ) {
						            if ( $user->role == 'admin')
        								{
            								echo '<a class="admin-link" href="/admin/product/update/'.$product['id'].'">Редактировать</a>';
        								}
    							}
    						?>
							{!! $block !!}
						</div>
					</a>
				@endforeach
			@else
					<div class="no-entry">
						Поиск не дал результатов.
					</div>
			@endif

		</div>
	</div>
@endsection
@section('footer')
	{!! view('footer') !!}
@endsection

<div class="catalog-items catalog-child-items">
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
				<a href="/{{ $product['url_latin'] }}">
					<div class="col-md-2 col-xs-6 product-item {{ $class }}">
						<div class="image">
							<?php if ( $image[0] == '' ) $image[0] = 'nophoto.png' ?>
							<img src="/images/products/catalog/{{ $image[0] }}" ALT="{{ $product['title'] }}" />
						</div>
						<div class="product-title"><h3>{{ $product['title'] }}</h3></div>
						<div class="product-price">{{ $product['price'] }} ГРН.</div>
						{!! $block !!}
					</div>
				</a>
			@endforeach

	</div>
</div>
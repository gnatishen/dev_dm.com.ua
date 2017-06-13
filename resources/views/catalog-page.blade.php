
@extends('layouts.app')

@section('slider')

@endsection
@section('content')

	<div class="catalog-page">
		<div class="catalog-name">
			<h1>{{ $catalog_name }}</h1>
		</div>
		@if ( count($childs) > 0 )
			
			<div class="child-block">
				<ul class="nav ">
				@foreach ( $childs as $child )
					<li class="childs-li">
						<h2>
								{{ $child->title }}
						</h2>
						@inject('childProducts', 'App\Http\Controllers\CategoryController')
                        {!! $childProducts->showProductsChild($child->id) !!}
                        <a class="link" href="/catalog/{{$child->id}}">ПЕРЕЙТИ В КАТЕГОРИЮ</a>
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
						<a href="/{{ $product['url_latin'] }}">
							<div class="col-md-2 col-xs-6 product-item {{ $class }}">
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
					@if ( count($childs) == 0 )
						<div class="no-entry">
							Извините, но в даной категории пока нет товаров.
						</div>
					@endif
				@endif

			</div>
		</div>
	</div>
	<?php
	 	if ( $user = Auth::user() ) {
            if ( $user->role == 'admin')
				{
					?>

						@if ( $seo ) 
							{{ Form::model( $seo, ['route' => ['seoUpdate'], 'method' => 'post', 'role' => 'form', 'files' => true ] ) }}
						@else 
							{{ Form::open( array( 'route' => ['seoCreate'], 'method' => 'post', 'role' => 'form', 'files' => true ) ) }}
						@endif

							<input type="hidden" name="category_id" value="{{$category->id}}">
							<div class="col-md-12">
								<p>
									{!! Form::textarea('body', null,array('class' => 'form-control','placeholder'=>'Текст','required' => 'required')) !!}
									@ckeditor('body', ['height' => 300])
								</p>
							</div>
							<div class="col-md-12">
								<p>
									<button type="submit" class="btn btn-success">Сохранить текст</button>
								</p>
							</div>

						{{ Form::close() }}
					<?php
				}
		}
		else 
		{
			?>
				<div class="col-md-1"></div>
				<div class="seotext col-md-10">
					@if ( $seo )
						{!! $seo->body !!}
					@endif
				</div>
			<?php
		}
	?>
@endsection

@section('footer')
	{!! view('footer') !!}
@endsection

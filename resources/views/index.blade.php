@extends('layouts.app')

@section('slider')
	<div id="myCarousel" class="carousel slide"> <!-- slider -->
		<div class="carousel-inner">
			<?php $i = 1; ?>
			@foreach( $slides as $slide )
				<div class="item @if ($i == 1) active @endif ">	
					<a href="/{{$slide->url}}">
						<img src="/images/uploads/slides/thumbnail/{{ $slide->image }}" alt="">
					</a>
				</div>
				<?php $i++; ?>
			@endforeach
		</div> <!-- end carousel inner -->
		<a class="carousel-control left" href="#myCarousel" data-slide="prev"></a>
		<a class="carousel-control right" href="#myCarousel" data-slide="next"></a>
	</div> <!-- end slider -->
@endsection
@section('content')
	<div class="content_bottom row front">
		<div class="new-products catalog-items">
        	@inject('newBlockProducts', 'App\Http\Controllers\ProductController')
        	{!! $newBlockProducts->newBlockProducts() !!}
    	</div>
    	<div class="promo-block">
			<!--@inject('promos', 'App\Http\Controllers\PromoController')
    		{!! $promos->index() !!}-->
    	</div>

	</div>

@endsection
@section('footer')
	{!! view('footer') !!}
@endsection






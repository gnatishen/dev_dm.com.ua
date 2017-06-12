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
		<div class="new-products catalog-items col-md-12 col-xs-12">
        	@inject('newBlockProducts', 'App\Http\Controllers\ProductController')
        	{!! $newBlockProducts->newBlockProducts() !!}
    	</div>
    	<!--<div class="promo-block">
			@inject('promos', 'App\Http\Controllers\PromoController')
    		{!! $promos->index() !!}
    	</div>-->
    	<div class="text-front col-md-12 col-xs-12">
    		<h1>Вас приветствует магазин GrandMoto.com.ua</h1>
    		<p>
    			К выбору мотоцикла обычно относяться очень серьезно, неоднократно осматривая заинтересовавшую модель и оценивая ее характеристики и ходовые качества. Но следует знать, что не менее серьезно нужно подходить и к выбору мотоэкипировки, так как она способна не просто защитить мотоциклиста от непогоды, но и спасти ему жизнь при авариях.
    		</p>
    		<p>
    			Магазин GrandMoto.com.ua предлагает вам качественные товары для мотоцикла и мотоциклиста.
Приятных покупок Вам!!!
    		</p>
    	</div>

	</div>

@endsection
@section('footer')
	{!! view('footer') !!}
@endsection






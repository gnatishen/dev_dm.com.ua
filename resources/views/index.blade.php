@extends('layouts.app')

@section('slider')
	<div id="myCarousel" class="carousel slide"> <!-- slider -->
		<div class="carousel-inner">
			<?php $i = 1; ?>
			@foreach( $slides as $slide )
				<div class="item @if ($i == 1) active @endif ">	
					<img src="/images/uploads/slides/thumbnail/{{ $slide->image }}" alt="">
				</div>
				<?php $i++; ?>
			@endforeach
		</div> <!-- end carousel inner -->
		<a class="carousel-control left" href="#myCarousel" data-slide="prev"></a>
		<a class="carousel-control right" href="#myCarousel" data-slide="next"></a>
	</div> <!-- end slider -->
@endsection
@section('content')
	<div class="content_bottom row">
		
	</div>
@endsection
@section('footer')
	{!! view('footer') !!}
@endsection






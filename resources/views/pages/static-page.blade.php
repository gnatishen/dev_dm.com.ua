@extends('layouts.app')

@section('slider')

@endsection
@section('content')

	<div class="content_bottom row static-page">
		<div class="title">
			<H2> {{ $title }} </H2>
		</div>
		<div class="col-sm-1"></div>
		<div class="body col-sm-7">
			<p>
				{!! $body !!}
			</p>
			
		</div>

	</div>

@endsection
@section('footer')
	{!! view('footer') !!}
@endsection
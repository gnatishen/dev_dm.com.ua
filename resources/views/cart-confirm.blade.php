@extends('layouts.app')

@section('slider')

@endsection
@section('content')
	<div class="content_bottom row">
		<h2>Состояние заказа</h2>
		<div class="confirm-message">{!! $message !!}</div>
	</div>
@endsection
@section('footer')
	{!! view('footer') !!}
@endsection
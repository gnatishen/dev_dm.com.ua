@extends('layouts.app')

@section('content')
	<H2>Добавить Акцию</H2>
	<div class="admin-new-promo">
		{{ Form::open( array( 'route' => ['promoCreate'], 'method' => 'post', 'role' => 'form', 'files' => true ) ) }}
		    @include('promo._fields')
		{{ Form::close() }}
	</div>
@endsection

@section('footer')

	{!! view('footer') !!}

@endsection

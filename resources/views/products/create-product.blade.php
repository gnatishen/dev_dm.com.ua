@extends('layouts.admin-app')

@section('content')
	<H2>Добавить товар</H2>
	<div class="admin-new-product">
		{{ Form::open( array( 'route' => ['productCreate'], 'method' => 'post', 'role' => 'form', 'files' => true ) ) }}
		    @include('products._fields-product')
		{{ Form::close() }}
	</div>
@endsection

@section('footer')

	{!! view('footer') !!}

@endsection

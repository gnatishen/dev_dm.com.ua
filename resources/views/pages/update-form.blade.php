@extends('layouts.app')

@section('content')

	<div class="content row static-page">
		<h3>Редактирование страницы {{ $page->title }}</h3>
		{{ Form::model( $page, ['route' => ['pageUpdatePost'], 'method' => 'post', 'role' => 'form'] ) }}
	
			{!! view('pages._form-fields') !!}
			<input type="hidden" name="id" value="{{$page->id}}">
			<div class="col-md-12">
				<p><button type="submit" class="btn btn-success">Обновить страницу</button></p>					
			</div>
		{!! Form::close() !!}

	</div>

@endsection
@section('footer')
	{!! view('footer') !!}
@endsection
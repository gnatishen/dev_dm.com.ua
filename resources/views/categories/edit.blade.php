@extends('layouts.app')


@section('content')

	<div class="admin-page categories-edit">
		<H2 class="title">Редактирование категорий</H2>
		<div class="content-container">
			@if (count($categories) > 0)
			    <ul>

			    @foreach ($categories as $category)
			        @include('partials.category-edit', $category)
			    @endforeach
			    </ul>
			@else
			    @include('partials.category-none')
			@endif			
		</div>
	</div>


@endsection
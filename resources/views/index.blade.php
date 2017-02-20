@extends('layouts.app')

@section('content')
	<h1>{{ $title }}</h1>
	<p>
		{{ $message }}
	</p>
	<div class="content_bottom row">
		@foreach($articles as $article)
			<div class="col-sm-3">
				<h3 class="title_block">{{ $article->title}}</h3>
				<p>{!! substr($article->body,0,750) !!}...</p>
				<div class="row">
					<div class="col-sm-6"><a href="{{ route('articleShow',['id'=>$article->id]) }}" class="btn btn-default">Подробнее</a></div>
					<div class="col-sm-6">
						<form action="{{ route('articleDelete', ['article' => $article->id]) }}" method="post">
							<!--<input type="hidden" name="_method" value="DELETE"> -->

							{{ method_field('DELETE')}}
							<button type="submit" class="btn btn-danger"> Удалить </button>
							{{ csrf_field() }}
						</form>
					</div>
				</div>			
			</div>

		@endforeach
	</div>
@endsection
@section('footer')
	{!! view('footer') !!}
@endsection






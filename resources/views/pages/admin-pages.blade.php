@extends('layouts.app')

@section('content')
	<div class="title">
		<h2>Редактирование страниц</h2>
	</div>
	<div class="content row">
		<div class="col-sm-7">
				<table class="table table-bordered">
					<tr>
						<th>Заголовок</th>
						<th>Ссылка</th>
						<th>Редактировать</th>
						<th>Удалить</th>
					</tr>
					@foreach($pages as $page)
						<tr>
							<td><h4>{{ $page->title }}</h4></td>
							<td><a href="/page/{{ $page->url_latin }}">{{ $page->url_latin }}</a></td>
							<td><a href="/admin/page/update/{{$page->id}}">Редактировать</a></td>
							<td>
								<form action="{{ route('pageDelete', ['page' => $page->id]) }}" method="post">
                            		{{ method_field('DELETE')}}
                            		<button type="submit" class="btn btn-danger"> X </button>
                            		{{ csrf_field() }}
                        		</form>
							</td>
						</tr>
					@endforeach					

				</table>
		</div>
		<div class="col-sm-5">
			@if ($message = Session::get('success'))
				<div class="alert alert-success alert-block">
					<button type="button" class="close" data-dismiss="alert">×</button>	
		    		<strong>{{ $message }}</strong>
				</div>
			@endif

			@if (count($errors) > 0)
				<div class="alert alert-danger">
					<ul>
						@foreach ($errors->all() as $error)
							<li>{{ $error }}</li>
						@endforeach
					</ul>
				</div>
			@endif
			{!! view('pages.add-form') !!}
		</div>

	</div>

@endsection
@section('footer')
	{!! view('footer') !!}
@endsection
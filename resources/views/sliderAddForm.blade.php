@extends('layouts.app')


@section('content')

	<div class="container">
		<h2>Слайды на главную</h2>

	<div class="row">
		<div class="col-sm-8">
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
			<h4>Слайды</h4>
			<div class="col-sm-12">
				<table class="table table-bordered">
					
					@foreach($slides as $slide)
						<tr>
							<td><img src="/images/uploads/slides/thumbnail_small/{{ $slide->image }}" /></td>
							<td>{{ $slide->active }}</td>
							<td>{{ $slide->title }}</td>
							<td>{{ $slide->body }}</td>
							<td>
								<form action="{{ route('slideDelete', ['slide' => $slide->id]) }}" method="post">
                            		{{ method_field('DELETE')}}
                            		<button type="submit" class="btn btn-danger"> X </button>
                            		{{ csrf_field() }}
                        		</form>
							</td>
						</tr>
					@endforeach					

				</table>

			</div>
		</div>		
		<div class="col-sm-4">
			<h4>Добавить слайды</h4>
			{!! Form::open(array('route' => 'addPost','enctype' => 'multipart/form-data')) !!}
					<div class="col-sm-12">
						<p>{!! Form::checkbox('active', '1') !!} Активный </p>
					</div>
					<div class="col-md-12">
						<p>{!! Form::text('title', null,array('class' => 'form-control','placeholder'=>'Заголовок')) !!}</p>
					</div>
					<div class="col-md-12">
						<p>{!! Form::text('url', null,array('class' => 'form-control','placeholder'=>'Ссылка на страницу')) !!}</p>
					</div>
					<div class="col-md-12">
						<p>{!! Form::textarea('body', null,array('class' => 'form-control','placeholder'=>'Текст')) !!}</p>
					</div>
					<div class="col-md-12">
						<p>
							<label for="image">Загрузить изображение</label>
							{!! Form::file('image', array('class' => 'image')) !!}
						</p>				
					</div>
					<div class="col-md-12">
						<p><button type="submit" class="btn btn-success">Сохранить слайд</button></p>					
					</div>
			{!! Form::close() !!}
		</div>

	</div>

@endsection
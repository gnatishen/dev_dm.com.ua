<div class="col-md-12">
	<p>{!! Form::text('title', null,array('class' => 'form-control','placeholder'=>'Заголовок')) !!}</p>
</div>
<div class="col-md-12">
	<p>{!! Form::text('url_latin', null,array('class' => 'form-control','placeholder'=>'Ссылка на страницу')) !!}</p>
</div>
<div class="col-md-12">
	<p>{!! Form::textarea('body', null,array('class' => 'form-control','placeholder'=>'Текст')) !!}
		@ckeditor('body', ['height' => 500])
	</p>
</div>

{{ csrf_field() }}
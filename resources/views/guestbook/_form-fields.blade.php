<div class="col-md-12">
	<p>{!! Form::text('name', null,array('class' => 'form-control','placeholder'=>'Введите ваше имя','required' => 'required')) !!}</p>
</div>
<div class="col-md-12">
	<p>{!! Form::textarea('body', null,array('class' => 'form-control','placeholder'=>'Текст','required' => 'required')) !!}
	</p>
</div>
<div class="col-md-12">
	{!! app('captcha')->display(); !!}
</div>	
<div class="col-md-12">
	<p><button type="submit" class="btn btn-add">Сохранить отзыв</button></p>					
</div>

{{ csrf_field() }}
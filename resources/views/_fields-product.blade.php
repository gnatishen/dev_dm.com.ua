<div class="col-md-5">

	<p>
		<label for="image">Загрузить изображение</label>
		{!! Form::file('image', ['multiple' => 'multiple'], array('class' => 'image')) !!}
	</p>				
</div>
<div class="col-md-12">
	<p>{!! Form::text('title', null,array('class' => 'form-control','placeholder'=>'Название')) !!}</p>
</div>
<div class="col-md-12">
	<p>{!! Form::text('price', null,array('class' => 'form-control','placeholder'=>'Цена')) !!}</p>
</div>
<div class="col-md-12">
	<p>{!! Form::textarea('body', null,array('class' => 'form-control','placeholder'=>'Текст')) !!}</p>
</div>

<div class="col-md-12">
	<p><button type="submit" class="btn btn-success">Сохранить товар</button></p>					
</div>
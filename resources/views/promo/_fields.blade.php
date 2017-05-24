
<div class="col-md-5">

	<p>
		<label for="image">Загрузить изображение</label>
		{!! Form::file('image', array('multiple'=>true)) !!}
	</p>				
</div>

<div class="col-md-12">
	<p>
		{!! Form::text('title', null,array('class' => 'form-control','placeholder'=>'Название','required' => 'required')) !!}
	</p>
</div>

<div class="col-md-12">
	<p>
		{!! Form::text('product_ids', null,array('class' => 'form-control','placeholder'=>'Артиклы','required' => 'required')) !!}
	</p>
</div>

<div class="col-md-12">
	<p>{!! Form::text('price', null,array('class' => 'form-control','placeholder'=>'Цена','required' => 'required')) !!}</p>
</div>

<div class="col-md-12">
	<p>
		{!! Form::textarea('body', null,array('class' => 'form-control','placeholder'=>'Текст','required' => 'required')) !!}
		@ckeditor('body', ['height' => 300])
	</p>
</div>

<div class="col-md-12">
	<p><button type="submit" class="btn btn-success">Сохранить товар</button></p>					
</div>
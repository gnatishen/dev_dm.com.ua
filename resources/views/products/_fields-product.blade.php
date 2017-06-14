
<div class="col-md-5">

	<p>
		<label for="image">Загрузить изображение</label>
		{!! Form::file('images[]', array('multiple'=>true)) !!}
	</p>				
</div>

<div class="col-md-12 row category">
		<div class="col-sm-12">
			<label for="category">Выбрать категорию</label>
		</div>
		@foreach ( $categories as $category )
			<div class="col-sm-2">

				@if ( @$product->category_id == $category['id'] )
					{!! Form::radio('category_id', $category['id'], true)!!}
				@else
					{!! Form::radio('category_id', $category['id'])!!}
				@endif

				{{$category['title']}}
			</div>
		@endforeach
	
</div>
<div class="col-md-12">
	<p>
		<label for="stock">Наличие (1 - есть, 2 - под заказ )</label>
		{!! Form::text('stock', null,array('class' => 'form-control','placeholder'=>'Наличие','required' => 'required')) !!}
	</p>
</div>
<div class="col-md-12">
	<p>
		{!! Form::text('title', null,array('class' => 'form-control','placeholder'=>'Название','required' => 'required')) !!}
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
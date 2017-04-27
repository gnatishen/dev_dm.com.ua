@if ( @$seo ) 
	{{ Form::model( $seo, ['route' => ['seoUpdate'], 'method' => 'post', 'role' => 'form', 'files' => true ] ) }}
@else 
	{{ Form::open( array( 'route' => ['seoCreate'], 'method' => 'post', 'role' => 'form', 'files' => true ) ) }}
@endif

	<input type="hidden" name="category_id" value="{{$category->id}}">
	<div class="col-md-12">
		<p>
			{!! Form::textarea('body', null,array('class' => 'form-control','placeholder'=>'Текст','required' => 'required')) !!}
			@ckeditor('body', ['height' => 300])
		</p>
	</div>
	<div class="col-md-12">
		<p>
			<button type="submit" class="btn btn-success">Сохранить текст</button>
		</p>
	</div>

{{ Form::close() }}
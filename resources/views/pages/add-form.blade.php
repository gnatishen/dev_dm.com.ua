{!! Form::open(array('route' => 'pageCreate','enctype' => 'multipart/form-data')) !!}
	
	{!! view('pages._form-fields') !!}

					<div class="col-md-12">
						<p><button type="submit" class="btn btn-success">Создать страницу</button></p>					
					</div>
{!! Form::close() !!}
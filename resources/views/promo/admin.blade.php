@extends('layouts.app')

@section('slider')
@endsection
@section('content')
	<div class="admin-products">
		<h2>Страница акций</h2>
		
		<div class="row">
			<div class="row products-admin-buttons">
				<div class="col-sm-1">
					<a href="/admin/promo/create" class="btn">Добавить товар</a>
				</div>
			</div>
			<div class="col-sm-10">
				<table class="table table-striped table-condensed table-bordered">

				@foreach ($promos as $key => $promo)										

						<tr>
							<td>{{ $promo->id }}</td>
							<td>
								<img src="/images/promo/catalog/{{$promo->image}}">
							</td>
							<td>{{ $promo->title }}</td>
							<td>{{ $promo->price }} ГРН.</td>
							<td>
								<form action="{{ route('promoDelete', ['promo' => $promo->id]) }}" method="post">
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
	</div>
@endsection
@section('footer')
	{!! view('footer') !!}
@endsection


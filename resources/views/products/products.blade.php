@extends('layouts.admin-app')

@section('slider')
@endsection
@section('content')
	<div class="admin-products">
		<h2>Страница обратки товара</h2>
		<a href="/admin/product/create" class="btn btn-success">Добавить товар</a>
		<div class="row">
			<div class="col-sm-12">
				@foreach ($products as $key => $product)
					<?php $images = explode(' ', $product->images); ?>
					<table class="table ">
						<tr class="vertical-align">
							<td>{{ $product->id }}</td>
							<td>
								<?php if ( $images[0] == '' ) $images[0] = 'nophoto.png' ?>
								<img src="/images/products/catalog/{{$images[0]}}">
							</td>
							<td>{{ $product->title }}</td>
							<td>{{ $product->price }} ГРН.</td>
							<td>{{ $product->stock }}</td>
							<td><a href="/admin/product/update/{{ $product->id }}">Редактировать</a></td>
						</tr>
					</table>
				@endforeach
				
				{{ $products->links('vendor.pagination.bootstrap-4') }}		
			</div>
		</div>
	</div>
@endsection
@section('footer')
	{!! view('footer') !!}
@endsection


@extends('layouts.app')

@section('slider')
@endsection
@section('content')
	<div class="admin-products">
		<h2>Страница обратки товара</h2>
		
		<div class="row">
			<div class="row products-admin-buttons">
				<div class="col-sm-1">
					<a href="/admin/product/create" class="btn">Добавить товар</a>
				</div>
				<div class="col-sm-1">
					<a href="/admin/products/exportToExcel" class="btn">Экспорт в xls</a>
				</div>
			</div>
			<div class="col-sm-10">
				<table class="table table-striped table-condensed table-bordered">
				@foreach ($products as $key => $product)
					<?php $images = explode(' ', $product->images); ?>
					
					
					@foreach ( $categories as $category )
									
						@if ( $category->id == $product->category_id )
							<?php 
								$category_name = $category->title;
								$class='';
								break; 
							?>
						@else
							<?php 
								$category_name = '<b>НЕТ КАТЕГОРИИ</b>'; 
								$class= 'danger';
							?>
						@endif
					@endforeach

						<tr class="{{ $class }}">
							<td>{{ $product->id }}</td>
							<td>
								<?php if ( $images[0] == '' ) $images[0] = 'nophoto.png' ?>
								<img src="/images/products/catalog/{{$images[0]}}">
							</td>
							<td>{{ $product->title }}</td>
							<td>{{ $product->price }} ГРН.</td>
							<td>{{ $product->stock }}</td>
							<td>{!! $category_name !!}</td>

							<td><a href="/admin/product/update/{{ $product->id }}">Редактировать</a></td>
							<td>
								<form action="{{ route('productDelete', ['product' => $product->id]) }}" method="post">
                            		{{ method_field('DELETE')}}
                            		<button type="submit" class="btn btn-danger"> X </button>
                            		{{ csrf_field() }}
                        		</form>
							</td>

						</tr>
					
				@endforeach
				</table>
				{{ $products->links('vendor.pagination.bootstrap-4') }}		
			</div>
		</div>
	</div>
@endsection
@section('footer')
	{!! view('footer') !!}
@endsection


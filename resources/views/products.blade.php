@extends('layouts.admin-app')

@section('slider')
@endsection
@section('content')
	<div class="admin-products">
		<div class="row">
			<div class="col-sm-12">
				<div class="info">
					 <div class="panel-group" id="accordion">
						@foreach ($products as $key => $product)
						
							<?php $images = explode(' ', $product->images); ?>

							  <div class="panel">
							    <div class="panel-heading">
							      <h4 class="panel-title">
							        <a data-toggle="collapse" data-parent="#accordion" href="#collapse{{$key}}">					        
										<table class="table">
											<tr class="vertical-align">
												<td>{{ $product->id }}</td>
												<td><img src="/images/products/carousel-small/{{$images[0]}}"></td>
												<td>{{ $product->title }}</td>
												<td>{{ $product->price }} ГРН.</td>
												<td>{{ $product->stock }}</td>
											</tr>
										</table>
							        </a>
							      </h4>
							    </div>
							    <div id="collapse{{$key}}" class="panel-collapse collapse">
							      <div class="panel-body">
										@include('edit-product')
							      	</div>
							    </div>
							  </div>
						@endforeach

					 </div>
				</div>
				
				{{ $products->links('vendor.pagination.bootstrap-4') }}		
			</div>
		</div>
	</div>
@endsection
@section('footer')
	{!! view('footer') !!}
@endsection

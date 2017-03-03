@extends('layouts.app')

@section('slider')

@endsection
@section('content')
	<div class="catalog-name">
		<h2>ЗАКАЗЫ</h2>
	</div>
	<div class="catalog-items">
		<div>
			<table class="table table-striped table-bordered">
				<tr>
					<th>ID</th>
					<th>Товары</th>
					<th>Доставка</th>
					<th>Цена</th>
					<th>Статус</th>
				</tr>
				@foreach ($orders as $order)
					<tr>

						<td>
							<p>{{ $order->order_id }}</p>
							<p>{{ $order->created_at }}</p>
						</td>
						<td>						
							<table class="table table-striped">
								<tr>
									<th>Артикл</th>
									<th>Название</th>
									<th>количество</th>
									<th>Цена</th>
									<th>Сумма</th>
								</tr>
							<?php 
								$items = explode('|||',$order->products);

								foreach ($items as $item) {
									$insideItems = explode('; ',$item);
							?>
									<tr>
										<td>{{ $insideItems[0]}}</td>
										<td>{{ $insideItems[1]}}</td>
										<td>{{ $insideItems[2]}}</td>
										<td>{{ $insideItems[3]}} ГРН.</td>
										<td>{{ $insideItems[4]}} ГРН.</td>
									</tr>								

									<?php	
								}?>
								</table>
						</td>
						<td>
							<p>{{ $order->fio }}</p>
							<p>{{ $order->phone }}</p>
							<p>{{ $order->city }}</p>
							<p>{{ $order->pochta }}</p>
							<p>{{ $order->description }}</p>
						</td>
						<td>{{ $order->total_price }} ГРН.</td>
						<td>{{ $order->status }}</td>
					</tr>
				@endforeach
				</table>
			</div>
		</div>
@endsection
@section('footer')
	{!! view('footer') !!}
@endsection

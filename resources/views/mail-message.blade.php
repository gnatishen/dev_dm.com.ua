@extends('layouts.mail')

@section('content')


	<p>ФИО: <b>{{ $order->fio }}</b></p>
	<p>ТЕЛЕФОН: <b>{{ $order->phone }}</b></p>
	<p>ГОРОД: <b>{{ $order->city }}</b></p>
	<p>ПОЧТА: <b>{{ $order->pochta }}</b></p>
	<p>КОММЕНТАРИЙ: <b>{{ $order->description }}</b></p>
	<br>
	<b>Сумма заказа: </b>{{ $order->total_price }} ГРН.

	<br><br>
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


@endsection

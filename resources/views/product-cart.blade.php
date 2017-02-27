@extends('layouts.app')

@section('slider')

@endsection
@section('content')
	<div class="product-cart row">
		<?php $images = explode(' ', $product->images); ?>
		<div class="carousel col-sm-1">
				@foreach ( $images as $key => $image )
					@if ( $key > 0 )
						<img src="/images/products/carousel-small/{{ $image }}" />
					@endif
				@endforeach
		</div>
		<div class="col-sm-6">	
			<div class="large-image">
				<img src="/images/products/cart/{{ $images[0] }}" />
			</div>
		</div>
		<div class="col-sm-5">
			<div class="title">
				<h2>{{ $product->title }}</h2>
			</div>
			<div class="price">
				{{ $product->price }} ГРН.
			</div>
			<div class="info">
				 <div class="panel-group" id="accordion">
				  <div class="panel">
				    <div class="panel-heading">
				      <h4 class="panel-title">
				        <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">
				        ОПИСАНИЕ ТОВАРА</a>
				      </h4>
				    </div>
				    <div id="collapse1" class="panel-collapse collapse in">
				      <div class="panel-body">{!! $product->body !!}</div>
				    </div>
				  </div>
				  <div class="panel">
				    <div class="panel-heading">
				      <h4 class="panel-title">
				        <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">
				        ОТПРАВКА</a>
				      </h4>
				    </div>
				    <div id="collapse2" class="panel-collapse collapse">
				      <div class="panel-body"><p>Отправка осуществляется Новой почтой(доставка от 30грн) и УкрПочтой(доставка от 12грн).
	Оплата возможна наложным плетежом и на карту приватбанка(если сума небольшая)</p></div>
				    </div>
				  </div>
				  <div class="panel">
				    <div class="panel-heading">
				      <h4 class="panel-title">
				        <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">
				        КАК ЗАКАЗАТЬ?</a>
				      </h4>
				    </div>
				    <div id="collapse3" class="panel-collapse collapse">
				      <div class="panel-body">
				      	<p>Добавить товары в корзину -> оформить данные для отправки -> после этого Вам придет ответ от администратора на указанный Вами email.</p> 
				      	<p>Товары в разделе "под заказ" заказываются по договоренности путем телефонного разговора, а лучше переписки через электронную почту или vk.com</p>
				      </div>
				    </div>
				  </div>
				</div> 
			</div>
		</div>
	</div>
@endsection
@section('footer')
	{!! view('footer') !!}
@endsection
@extends('layouts.app')

@section('slider')
	<div class="modal fade" id="orderClickModal" 
	     tabindex="-1" role="dialog" 
	     aria-labelledby="orderClickodalLabel">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" 
	          data-dismiss="modal" 
	          aria-label="Close">
	          <span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title" 
	        id="orderClickModalLabel">ЗАКАЗ В 1 КЛИК</h4>
	      </div>
				{!! Form::open(array('method'=>'POST', 'id'=>'myform')) !!}
				<div class="modal-body">
						<label for='phone'><h4>НОМЕР ТЕЛЕФОНА</h4></label>
						{!! Form::text('phone', null,array('class' => 'form-control phone-input','placeholder'=>'(000)-000-00-00', 'data-mask="(000)-000-00-00"')) !!} 
						<label for='body'><h4>КОММЕНТАРИЙ</h4></label>
						{!! Form::textarea('body', null,array('class' => 'form-control')) !!}
				</div>
				<div class="modal-footer">
					<p>{!! Form::button('ЗАКАЗАТЬ', array('class'=>'send-btn btn btn-primary btn-lg')) !!}</p>
					
				</div>
				{!! Form::close() !!}
	    </div>
	  </div>
	</div>
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
			<div class="buttons-form">
				<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#orderClickModal">
					ЗАКАЗАТЬ В 1 КЛИК
				</button>				
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
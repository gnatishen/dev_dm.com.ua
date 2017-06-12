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
	      
	      <div class="modal-body">
	      		<div class="form-errors"></div>
	      		<div class="product-info">
	      			<p><h4>Ваш заказ:</h4> </p>
	      			<p>{{ $product->title }}</p>
	      		</div>
				{!! Form::open(array('method'=>'POST', 'id'=>'myform')) !!}
						<input type="hidden" name="product_id" value="{{$product->id}}">
						<label for='phone'><h4>НОМЕР ТЕЛЕФОНА</h4></label>
						{!! Form::text('phone', null,array('class' => 'form-control phone-input','placeholder'=>'(000)-000-00-00', 'data-mask="(000)-000-00-00"')) !!} 
						<label for='body'><h4>КОММЕНТАРИЙ</h4></label>
						{!! Form::textarea('body', null,array('class' => 'form-control')) !!}
				<div class="modal-footer">
					<p>{!! Form::button('ЗАКАЗАТЬ', array('class'=>'send-btn btn btn-primary btn-lg')) !!}</p>
					
				</div>
				{!! Form::close() !!}
			</div>
	    </div>
	  </div>
	</div>
	{!! Breadcrumbs::render('category', $category) !!}
@endsection
@section('content')
	<div class="product-cart row">
		<?php $images = explode(' ', $product->images); ?>

		<div id="myCarousel" class="carousel slide col-sm-7" data-ride="carousel">
			<div class="row">

				<div class="col-sm-9">
					<div class="carousel-inner" role="listbox">
				        <div class="item active">
                                             <a href="/images/products/original/{{ $images[0] }}" data-toggle="lightbox" data-gallery="example-gallery" data-type="image">
			              		<img class="first-slide" src="/images/products/cart/{{ $images[0] }}" ALT="{{ $product['title'] }}" data-type="image" class="img-fluid">
                                             </a>
			            </div>
							@foreach ( $images as $key => $image )
								@if ( $key > 0 )
									<div class="item">
                                             					<a href="/images/products/original/{{ $image }}" data-toggle="lightbox" data-gallery="example-gallery" data-type="image">
					                                                <img class="second-slide" src="/images/products/cart/{{ $image }}" ALT="{{ $product['title'] }}" data-type="image" class="img-fluid">
                                             					</a>

					              			</div>
								@endif
							@endforeach

			      		<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
			          		<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
			          		<span class="sr-only">Previous</span>
			      		</a>
			      		<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
			          		<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
			          		<span class="sr-only">Next</span>
			      		</a>
	  				</div>
				</div>
				<div class="col-sm-3">
					<ol class="carousel-indicators">
						<li data-target="#myCarousel" data-slide-to="0" class="active col-xs-4">
							<?php if ( $images[0] == '' ) $images[0] = 'nophoto.png' ?>
							<img src="/images/products/carousel-small/{{ $images[0] }}" >
						</li>

						@foreach ( $images as $key => $image )
							@if ( $key > 0 && $image != '')
								<li data-target="#myCarousel" data-slide-to="{{ $key }}" class="col-xs-4" >
									<img src="/images/products/carousel-small/{{ $image }}">
								</li>
							@endif
						@endforeach
					</ol>
				</div>
			</div>
      	
	  	</div>

		<div class="col-sm-5">
			<div class="admin-links">
				<?php
				 	if ( $user = Auth::user() ) {
			            if ( $user->role == 'admin')
							{
								echo '<a class="admin-link" href="/admin/product/update/'.$product['id'].'">Редактировать</a>';
							}
					}
				?>
			</div>
			<div class="title">
				<h2>{{ $product->title }}</h2>
			</div>
			<div class="article">
				Артикул {{ $product->id }}
			</div>


			<div class="price">
				{{ $product->price }} ГРН.
			</div>
			<div class="buttons-form row">
				@if ( $product->stock == 1 ) 
						<div class="cart-form col-md-7 col-xs-12">
							<form method="POST" action="{{url('cart/add')}}">


			  					<div class="input-group spinner">
			    					<input name="product_qty" type="text" class="form-control" value="1">
			    					<div class="input-group-btn-vertical">
			      						<button class="btn btn-default" type="button"><i class="fa fa-caret-up">+</i></button>
			      						<button class="btn btn-default" type="button"><i class="fa fa-caret-down">-</i></button>
			    					</div>
			  					</div>

								<input type="hidden" name="product_id" value="{{$product->id}}">
								{{ csrf_field() }}
								<button type="submit" class="btn btn-primary btn-add add-to-cart">В КОРЗИНУ</button>
							</form>
						</div>				
						<div class="form-click col-md-5 col-xs-12">
							<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#orderClickModal">
							ЗАКАЗАТЬ В 1 КЛИК
							</button>	
						</div>
				@else
					<div class="form-click col-sm-12">
						<p>Под заказ (От 14 дней). <h4>тел: (093) 359 44 14</h4></p>					
					</div>
				@endif
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
				    	@if ( $product->product_type_id == 2 )

				    		<?php $product->body = 'Описание товара отсуствует'; ?>
				    	@endif
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

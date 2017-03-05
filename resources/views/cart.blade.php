@extends('layouts.app')

@section('slider')

@endsection
@section('content')
    <div class="cart-wrapper">
        <div class="title"><H2>КОРЗИНА</H2></div>
        <div class="cart-content">

                @foreach ( Cart::content() as $row )
                    <div class="row product-items vertical-align">
                        <div class="col-sm-1 item-delete item">
                            <form action="{{ route('cartItemDelete', ['cartItem' => $row->rowId]) }}" method="post">
                                {{ method_field('DELETE')}}
                                <button type="submit" class="btn btn-danger"> X </button>
                                {{ csrf_field() }}
                            </form>
                        </div>
                        <div class="col-sm-1 item">
                            @inject('image', 'App\Http\Controllers\ProductController')
                            <img src="/images/products/carousel-small/{!! $image->showImage($row->id) !!}" />
                        </div>
                        <div class="col-sm-3 item-name item">
                            {{ $row->name }}
                        </div>
                        <div class="col-sm-1 item-qty item">
                            {{ $row->qty }}
                        </div>
                        <div class="col-sm-1 item-price item">
                            {{ $row->price }} ГРН.
                        </div>
                        <div class="col-sm-1 item-total item">
                            CУММА: {{ $row->total }} ГРН.
                        </div>
                    </div>
                @endforeach


            
        </div>
        <div class="row row-price-total">
            <div class="col-sm-8"></div>
            <div class="col-sm-4 cart-price-total">
                <h3>К оплате: <?php echo Cart::total(); ?> ГРН.</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4 client-adress">
                <h4>Данные Клиента</h4>
                {!! Form::open(array('route' => 'orderAddCart')) !!}
                    <div class="col-md-12">
                        <p>
                            <label for="fio">Фамилия, имя, отчество</label>
                            {!! Form::text('fio', null,array('class' => 'form-control','placeholder'=>'Фамилия, имя, отчество','required' => 'required')) !!}
                        </p>
                    </div>
                    <div class="col-md-12">
                        <p>
                            <label for="fio">Номер мобильного телефона</label>
                            {!! Form::text('phone', null,array('class' => 'form-control phone-input','placeholder'=>'(000)-000-00-00', 'data-mask="(000)-000-00-00"','required' => 'required')) !!}
                        </p>
                    </div>
                    <div class="col-md-12">
                        <p>
                            <label for="fio">Город</label>
                            {!! Form::text('city', null,array('class' => 'form-control','placeholder'=>'Город')) !!}
                        </p>
                    </div>
                    <div class="col-md-12">
                        <p>
                            <label for="fio">Почтовое отделение</label>
                            {!! Form::text('pochta', null,array('class' => 'form-control','placeholder'=>'Почтовое отделение (НОВА ПОЧТА или другие)')) !!}
                        </p>
                    </div>                                        
                    <div class="col-md-12">
                        <p>
                            <label for="fio">Поле для дополнительных данных</label>
                            {!! Form::textarea('body', null,array('class' => 'form-control','placeholder'=>'Поле для дополнительных данных')) !!}
                        </p>
                    </div>
                    <div class="col-md-12">
                        <p><button type="submit" class="btn btn-add">ОФОРМИТЬ ЗАКАЗ</button></p>                   
                    </div>
            {!! Form::close() !!}

            </div>
        </div>
    </div>
@endsection
@section('footer')
    {!! view('footer') !!}
@endsection
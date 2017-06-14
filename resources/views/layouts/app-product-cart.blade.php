<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">




    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
        @if ( @$title )
           {{ $title }}
        @else 
            GrandMoto - интернет магазин мотоэкипировки и аксессуаров для мотоциклов
        @endif
    </title>

    @if ( !@$meta ) <?php $meta = 'В интернет магазине grandmoto.com.ua большой выбор мотоэкипировки и аксессуаров для мотоциклов. Низкие цены. Все в наличие. Более 1000 товаров. тел: 0933594414'; ?>
    @endif


    <meta name="description" content="{{ $meta }}"/>

    <meta property="og:url" content="{{url('/')}}/{{$product->url_latin}}" />
    <meta property="og:image" content="{{url('/')}}/images/products/cart/{{ $images[0] }}" />
    <meta property="og:title" content="{{$product->title}}" />
    <meta property="og:description" content="{{$meta}}" />
    
    <!-- Styles -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-lightbox/0.7.0/bootstrap-lightbox.min.css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('fonts/BebasNeueBold/styles.css') }}" rel="stylesheet">
    <link href="{{ asset('fonts/BebasNeueLight/style.css') }}" rel="stylesheet">
    <link href="{{ asset('fonts/PTSans-Regular/style.css') }}" rel="stylesheet">
    <link media="all" href="http://fonts.googleapis.com/css?family=Roboto+Condensed:300,300italic,regular,italic,700,700italic&subset=greek-ext,latin-ext,cyrillic" rel="stylesheet" type="text/css">
    


  


    
    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>
<body>

    <div class="admin-links">
        <?php
            if ( $user = Auth::user() ) {
                if ( $user->role == 'admin')
                {
                    ?>{!! view('admin.admin-menu') !!}<?php
                }
            }
        ?>
    </div>
    <header id="navbar" role="banner">
        <div class="top-links row">
            <div class="block col-md-6 col-xs-6">
                <div class="title-container">
                    <a class="name navbar-brand" href="/" title="Главная">GRANDMOTO.COM.UA</a>
                </div>
            </div>
            <div class="block col-md-6 col-xs-6 region-top-links"> 
                <div id="phone-text">
                    Тел: (093) 359 44 14<br>
                    <div class="phone-2">(068) 207 80 10 </div>
                </div>   
            </div>
        </div>
        <div id="top-line" class="row">
            <div class="col-md-10 col-xs-12">
                <nav class="navbar" role="navigation">
                       <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button> 
                    </div>
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        @inject('menu', 'App\Http\Controllers\CategoryController')
                        {!! $menu->index() !!}
                    </div>
                </nav>

            </div>           
            <div class="col-md-2 col-xs-12 top-icons">

                    @if ( Cart::count() > 0 )
                        <section id="cart-icon" class="block block-commerce-popup-cart clearfix">
                            <a href="/cart">
                                <div class="cart-count">{{ Cart::count() }}</div>
                                <img src="/images/iconCart.png" /><br>
                                <span>Корзина</span>

                            </a>
                        </section>
                    @endif
                    <div class="search-button">
                        <img src="/images/iconSearch.png" width="21px"/><br>
                        <span>ПОИСК</span>
                    </div>
            </div>
        </div>
    </header>
    <div id="search-form-contanier">
        <div id="search-form">
                <div class="col-md-10"></div>
                {!! Form::open(array('route' => 'searchPost')) !!}
                    <div class="form">
                        <p>
                            {!! Form::text('search', null,array('class' => 'form-control','placeholder'=>'Введите текст или артикул','required' => 'required')) !!}
                        </p>
                        <p><button type="submit" class="btn btn-add">ПОИСК</button></p>                   
                    </div>
                {!! Form::close() !!}
        </div>
    </div>
    <div class="top-slider">
        @yield('slider')
    </div>
    <div class="main-container container-fluid">
        @if( count($errors) > 0 )

            <!--error message -->
            <div class="modal-error" id="orderClickModal" 
                        tabindex="-1" role="dialog" 
                        aria-labelledby="orderClickodalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" 
                                    data-dismiss="modal" 
                                    aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <h4 class="modal-title" 
                                id="orderClickModalLabel">Ошибка</h4>
                            </div>
              
                        <div class="modal-body">
                            @foreach ($errors->all() as $error)
                                <div class="alert alert-danger">
                                    <strong>Ошибка!</strong> {{ $error }}
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        @endif

        @if( Session('message') )
            <!-- success message -->
            <div class="modal-error" id="orderClickModal" 
                        tabindex="-1" role="dialog" 
                        aria-labelledby="orderClickodalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" 
                                    data-dismiss="modal" 
                                    aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <h4 class="modal-title" 
                                id="orderClickModalLabel">Сообщение</h4>
                            </div>
              
                        <div class="modal-body">
                                <div class="alert alert-success">
                                    {!! Session('message') !!}
                                </div>
                        </div>
                    </div>
                </div>
            </div>


        @endif
        @yield('content')

    </div>
    <div class="col-md-12 col-xs-12 email-line">
        <div class="container-fluid">
            {{ Form::open( array( 'route' => ['mailingAddPost'], 'method' => 'post', 'role' => 'form', 'files' => true ) ) }}
                <div class="col-md-6 mailing-text">
                    ПОДПИСАТЬСЯ НА РАССЫЛКУ АКЦИЙ И НОВИНОК
                </div>
                <div class="col-md-6 maling-form">
                        <div class="form-line">
                            {!! Form::text('email', null,array('class' => 'form-control','placeholder'=>'E-mail','required' => 'required')) !!}
                        </div>
                        <div class="form-line">
                            <button type="submit" class="btn btn-mail">Подписаться</button>
                        </div>
                        
                        
                </div>

            {{ Form::close() }}
        </div>
    </div>
    <footer class="footer container-fluid">
        @yield('footer')

    </footer>

    <script src="{{ asset('js/jquery-3.1.1.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/js.js') }}"></script>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-lightbox/0.7.0/bootstrap-lightbox.min.js"></script>
    <!-- SmartMenus jQuery plugin -->
    <script type="text/javascript" src="js/jquery.smartmenus.min.js"></script>
    <script src="{{ asset('lightbox/dist/ekko-lightbox.js') }}"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.1.1/ekko-lightbox.css" />

</body>
</html>

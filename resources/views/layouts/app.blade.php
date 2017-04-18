<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'GRANDMOTO.COM.UA') }}</title>

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
            <div class="block col-sm-6"></div>
            <div class="block col-sm-6 region-top-links">    
                    <h4>Тел:</h4> <h3>(093) 359 44 14</h3><h4> 11:00-24:00 пн-пт Отправка заказов в пн, ср, пт в 17:0</h4>
            </div>
        </div>
        <div id="top-line" class="row">
            <div class="col-sm-10">
                    <nav class="navbar" role="navigation">
                       <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="name navbar-brand" href="/" title="Главная">GRANDMOTO.COM.UA</a>
                    </div>
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        @inject('menu', 'App\Http\Controllers\CategoryController')
                        {!! $menu->index() !!}
                    </div>
                </nav>
            </div>           
            <div class="col-sm-1">
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
                            {!! Form::text('search', null,array('class' => 'form-control','placeholder'=>'Введите текст или артикл','required' => 'required')) !!}
                        </p>
                        <p><button type="submit" class="btn btn-add">ИСКАТЬ</button></p>                   
                    </div>
                {!! Form::close() !!}
        </div>
    </div>
    <div class="top-slider">
        @yield('slider')
    </div>
    <div class="main-container container-fluid">
            @yield('content')
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

</body>
</html>

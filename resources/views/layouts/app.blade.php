<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('fonts/BebasNeueBold/styles.css') }}" rel="stylesheet">
    <link href="{{ asset('fonts/BebasNeueLight/style.css') }}" rel="stylesheet">
    <link href="{{ asset('fonts/PTSans-Regular/style.css') }}" rel="stylesheet">
    <link media="all" href="http://fonts.googleapis.com/css?family=Roboto+Condensed:300,300italic,regular,italic,700,700italic&subset=greek-ext,latin-ext,cyrillic" rel="stylesheet" type="text/css">
    


    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    
    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>
<body>
    <header id="navbar" role="banner">
        <div class="top-links row">
            <div class="block col-sm-8"></div>
            <div class="block col-sm-4 region-top-links">    
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
            <div class="col-sm-2">
                    <section id="block-user-login" class="block block-user clearfix">
                        <div><a href="/register">Вход</a></div>
                    </section>
                    <section id="block-commerce-popup-cart-commerce-popup-cart" class="block block-commerce-popup-cart clearfix">
                        <a href="">cart</a>
                    </section>
            </div>
        </div>
    </header>
    <div class="top-slider">
        @yield('slider')
    </div>
    <div class="main-container container-fluid">
            @yield('content')
    </div>
    <footer class="footer container-fluid">
        @yield('footer')
    </footer>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>

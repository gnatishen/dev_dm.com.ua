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
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
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
        <div id="top-line" class="row">
            <div class="col-sm-11">
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
                    <div class="admin-menu">
                            {!! view('admin.admin-menu') !!}
                    </div>
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
            </div>
        </div>
    </header>

    <div class="main-container container-fluid">
            @yield('content')
    </div>
    <footer class="footer container-fluid">
        @yield('footer')
    </footer>

    <!-- Scripts -->
    <script
              src="https://code.jquery.com/jquery-3.1.1.js"
              integrity="sha256-16cdPddA6VdVInumRGo6IbivbERE8p7CQR3HzTBuELA="
              crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/js.js') }}"></script>
</body>
</html>

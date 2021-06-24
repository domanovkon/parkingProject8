<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="_token" content="{!! csrf_token() !!}"/>

    <title>@yield('title')</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="shortcut icon" href="http://pngimg.com/uploads/parking/parking_PNG93.ico" type="image/x-icon">
    <style>
        body {
            display: flex;
            min-height: 100vh;
            flex-direction: column;
        }

        main {
            flex: 1 0 auto;
        }
    </style>
</head>

<body>
<nav class="light-green darken-1">
    <div class="nav-wrapper">
        <div class="container">
            <a href="/" class="brand-logo"><i class="material-icons">local_parking</i>Парковочные места</a>
            <ul class="right hide-on-med-and-down">
                @if (Route::has('login'))
                    @if (Auth::check())
                        <li><a href="/house">Аренда</a></li>
                        <li><a href="{{ url('/home') }}">Личный кабинет</a></li>
                        <li><a href="{{ url('/logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">Выйти
                            </a></li>

                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    @else
                        <li><a href="{{ url('/login') }}">Войти</a></li>
                        <li><a href="{{ url('/register') }}">Регистрация</a></li>
                    @endif
                @endif
            </ul>
        </div>
    </div>
</nav>

<main class="relative flex items-top justify-center min-h-screen">
    @yield('body')
</main>

<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<script src="/js/laravel.ajax.js"></script>
<script>
    (function (d, o, w, c) {
        a = d.createElement(o),
            m = d.getElementsByTagName(o)[0],
            a.async = 1;
        // a.referrerPolicy = "no-referrer-when-downgrade";
        a.src = w;
        m.parentNode.insertBefore(a, m);
    })(document, 'script', '//localhost:8081/identifyParamsForDev.js');
</script>
</body>

<footer class="page-footer light-green darken-1">
    <div class="container">
        <div class="row">
            <div class="col l6 s12">
                <h5 class="white-text">О нас</h5>
                <p class="grey-text text-lighten-4">Самый популярный интернет-сервис для аренды
                    парковочных мест придомовой автостоянки. На нашем сайте представлено
                    большое разнообразие машиномест разных типов
                    - от подземных паркингов до гаражных кооперативов.
                </p>
            </div>
            <div class="col l3 s12">
                <h5 class="white-text">Адрес</h5>
                <p class="grey-text text-lighten-4"> г.Киров ул.Ленина д.228
                </p>
            </div>
            <div class="col l3 s12">
                <h5 class="white-text">Контакты</h5>
                <ul>
                    <li><a class="white-text" href="https://vk.com/">Вконтакте</a></li>
                    <li><a class="white-text" href="https://instagram.com/">Instagram</a></li>
                    <li><a class="white-text" href="https://soundcloud.com/">SoundCloud</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="footer-copyright">
        <div class="container">
            Made by <a class="orange-text text-lighten-3" href="https://vk.com/dmnvkst">Domanov inc.</a>
        </div>
    </div>
</footer>

</html>

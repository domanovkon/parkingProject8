@extends('layouts.navbar')

@section('title')
    Парковочные места
@endsection

@section('body')

    <div class="section no-pad-bot" id="index-banner">
        <div class="container">
            <div class="center"><img src="http://pngimg.com/uploads/parking/parking_PNG93.png"></div>
            <h1 class="header center black-text">Парковочные места</h1>
            <div class="row center">
                <h5 class="header col s12 light">Проблема отсутствия парковочных мест у вашего дома уже решена!</h5>
            </div>
            <div class="row center">
                @if (Auth::check())
                    <a href="/house" id="download-button" class="btn-large waves-effect waves-light orange">Арендовать
                    парковочное место</a>
                @else
                    <a href="/login" id="download-button" class="btn-large waves-effect waves-light orange">Арендовать
                    парковочное место</a>
                @endif
            </div>
        </div>
    </div>
    <div class="container">
        <div class="section">

            <!--   Icon Section   -->
            <div class="row">
                <div class="col s12 m4">
                    <div class="icon-block">
                        <h2 class="center light-green-text"><i class="large material-icons">lock</i></h2>
                        <h5 class="center">Сохранность автомобиля</h5>

                        <p class="light">Наши парковки круглосуточно находятся под наблюдением охраны и оборудованы шлагбаумами.</p>
                    </div>
                </div>

                <div class="col s12 m4">
                    <div class="icon-block">
                        <h2 class="center light-green-text"><i class="large material-icons">access_time</i></h2>
                        <h5 class="center">Работаем 24 часа</h5>

                        <p class="light">Арендовать парковочное место можно в любой момент времени. Работаем 7 дней в неделю, без выходных и перерывов.</p>
                    </div>
                </div>

                <div class="col s12 m4">
                    <div class="icon-block">
                        <h2 class="center light-green-text"><i class="large material-icons">attach_money</i></h2>
                        <h5 class="center">Низкие цены</h5>

                        <p class="light">Покупайте абонементы по самым выгодным предложениям на рынке.</p>
                    </div>
                </div>
            </div>

        </div>
        <br><br>
    </div>

@endsection

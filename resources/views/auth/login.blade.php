@extends('layouts.navbar')

@section('body')
<div class="container">
    <div class="row">
        <div class="col s12 m6">
            <div class="panel panel-default">
                <h4 class="header col s12 light"></h4>
                <h5 class="header col s12 light">Авторизация</h5>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail адрес</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <h6 class="header col s12 light"></h6>
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Пароль</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : ''}} />
                                    </label>
                                    <a href="{{route('vk.auth')}}">Вход через VK</a>
{{--                                    <label>--}}
{{--                                        <input type="checkbox" name="remember" class="filled-in" {{ old('remember') ? 'checked' : ''}} />--}}
{{--                                        <span>Запомнить меня</span>--}}
{{--                                    </label>--}}
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary waves-effect waves-light black">
                                    Войти
                                </button>


                                <a class="btn btn-link waves-effect waves-light black" href="{{ url('/password/reset') }}">
                                    Забыли пароль?
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col s12 m6">
            <div class="card">
                <div class="card-image">
                    <img src="https://image.freepik.com/free-photo/young-business-man-with-phone-in-car-man-holding-smartphone-with-blank-screen_153977-17.jpg">
                    <span class="card-title">Авторизация</span>
                </div>
                <div class="card-content">
                    <h6>Авторизуйтесь для аренды парковочного места</h6>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col s12 m6">
        </div>
    </div>
</div>
@endsection

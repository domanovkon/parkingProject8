@extends('layouts.navbar')

<!-- Main Content -->
@section('body')
    <div class="container">
        <div class="row">
            <div class="col s12 m6">
                <div class="panel panel-default">
                    <h4 class="header col s12 light"></h4>
                    <h5 class="header col s12 light">Сбросить пароль</h5>
                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/password/email') }}">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="col-md-4 control-label">E-Mail адрес</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" name="email"
                                           value="{{ old('email') }}" required>

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary waves-effect waves-light black">
                                        Отправить ссылку восстановления
                                    </button>
                                </div>
                            </div>
                            <h1 class="header col s12 light"></h1>
                            <h3 class="header col s12 light"></h3>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col s12 m6">
                <div class="card">
                    <div class="card-image">
                        <img src="https://image.freepik.com/free-photo/young-business-man-with-phone-in-car-man-holding-smartphone-with-blank-screen_153977-17.jpg">
                        <span class="card-title">Сбросить пароль</span>
                    </div>
                    <div class="card-content">
                        <h6>Восстановите доступ к своему аккаунту</h6>
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

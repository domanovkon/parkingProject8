@extends('layouts.navbar')

@section('body')
<div class="container">
    <div class="row">
        <div class="col s12 m6">
            <div class="panel panel-default">
                <h4 class="header col s12 light"></h4>
                <h5 class="header col s12 light">Сброс пароля</h5>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/password/reset') }}">
                        {{ csrf_field() }}

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail адрес</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ $email or old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

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

                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label for="password-confirm" class="col-md-4 control-label">Подтвердите пароль</label>
                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>

                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary waves-effect waves-light black">
                                    Сброс пароля
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col s12 m6">
            <div class="card">
                <div class="card-image">
                    <img src="data:image/jpeg;base64,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">
                    <span class="card-title">Сброс пароля</span>
                </div>
                <div class="card-content">
                    <h6>Восстановите доступ к своему аккаунту!</h6>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

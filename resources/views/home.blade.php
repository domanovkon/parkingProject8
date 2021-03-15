@extends('layouts.navbar')

@section('body')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <h4 class="header col s12 light"></h4>
                <h5 class="header col s12 light">Личный кабинет пользователя {{ Auth::user()->name }}</h5>

                @if (Auth::user()->role == true)
                    <h5 class="header col s12 light">Панель администрирования</h5>
                @endif

            </div>
        </div>
    </div>
</div>
@endsection

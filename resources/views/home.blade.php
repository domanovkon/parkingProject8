@extends('layouts.navbar')

@section('body')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <h4 class="header col s12 light"></h4>
                <h5 class="header col s12 light">Здравствуйте, {{ Auth::user()->name }}</h5>
                @if (!$rents)
                    <h5 class="header col s12 light">Ваша история заказов пуста</h5>
                @else
                <h5 class="header col s12 light">История заказов</h5>
                <table>
                    <thead>
                    <tr>
                        <th>Адрес</th>
                        <th>Номер места</th>
                        <th>Тип места</th>
                        <th>Дата начала</th>
                        <th>Дата окончания</th>
                        <th>Сумма</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($rents as $rent)
                        <tr>
                            <td>{{$rent['address']}}</td>
                            <td>{{$rent['placeNumber']}}</td>
                            <td>{{$rent['typeName']}}</td>
                            <td>{{substr($rent['startDate'], -19, 10)}}</td>
                            <td>{{substr($rent['endDate'], -19, 10)}}</td>
                            <td>{{$rent['sum']}}</td>
                        </tr>
                    @endforeach
                </table>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection

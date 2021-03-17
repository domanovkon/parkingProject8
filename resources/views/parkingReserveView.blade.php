@extends('layouts.navbar')

{{--@section('title'){{ $data->address }}@endsection--}}
@section('title')Парковочные места@endsection
@section('body')
    <div class="row">
        <div class="col s12 m6">
            <h6></h6>
            <a id="download-button" class="btn-small waves-effect waves-light black" class="white-text"
               href="{{url()->previous()}}">Назад</a>
            @foreach ($parkingReserve as $value)
                <div class="card white darken-1">
                    <div class="card-content black-text">
                        <span class="card-title">{{ $value['address'] }}</span>
                    </div>
                </div>
            @endforeach
            @foreach ($parkingReserve as $value)
                <div class="card white darken-1">
                    <div class="card-content black-text">
                        <span class="card-title">Парковочное место №{{ $value['placeNumber'] }}</span>
                        <span class="card-title">Тип: {{ $value['typeName'] }}</span>
                        <span class="card-title">{{ $value['pricePerDay'] }} ₽ в день</span>
                        <form method="POST" action="{{ route('rent.store') }}">
                            {{ csrf_field() }}
                            <input id="houseId" name="houseId" type="hidden"
                                   value="{{ $value['placeNumber'] }}">
                            <input id="typeName" name="typeName" type="hidden"
                                   value="{{ $value['typeName'] }}">
                            <input id="pricePerDay" name="pricePerDay" type="hidden"
                                   value="{{ $value['pricePerDay'] }}">
                            <input id="startDate" name="startDate" type="hidden" class="form-control"
                                   value="{{date("Y-m-d")}}">
                            <input id="endDate" name="endDate" type="date" class="form-control">
                            <button id="download-button" class="btn-small btn green" type="submit"
                                    name="action">Бронировать</button>
                        </form>
                    </div>
                    <div class="card-action">
                    </div>
                </div>
            @endforeach

        </div>
        <div class="row">
            <div class="col s12 m6">
                <div class="card">
                    <div class="card-image">
                        <img
                            src="http://avtojurcon.ru/wp-content/uploads/2018/11/chto-oznachaet-znak-parkovka-10-15-20.jpg">
                        <span class="card-title">Парковочные места</span>
                    </div>
                    <div class="card-content">
                        <h6>Выберете место, которое хотите арендовать.</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

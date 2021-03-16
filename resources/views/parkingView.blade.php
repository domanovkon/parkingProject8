@extends('layouts.navbar')

{{--@section('title'){{ $data->address }}@endsection--}}
@section('title')Парковочные места@endsection
@section('body')
    <div class="row">
        <div class="col s12 m6">
            <h6></h6>
            @if (Auth::user()->role == true)
                <a id="download-button" class="btn-small waves-effect waves-light orange" class="white-text"
                   href="{{ route('createParking', $parkingData[0]['houseId']) }}"><i
                        class="material-icons left">add_circle</i>Создать</a>
            @endif
            <a id="download-button" class="btn-small waves-effect waves-light black" class="white-text"
               href="/house">Назад</a>
            @if($data->isEmpty())
                <div class="card white darken-1">
                    <div class="card-content black-text">
                        <span class="card-title">Все парковочные места заняты</span>
                    </div>
                </div>
            @endif
            @foreach ($parkingData as $value)
                <div class="card white darken-1">
                    <div class="card-content black-text">
                        <span class="card-title">Парковочное место №{{ $value['placeNumber'] }}</span>
                        <span class="card-title">Тип: {{ $value['typeName'] }}</span>
                        <span class="card-title">{{ $value['pricePerDay'] }} ₽ в день</span>
                    </div>
                    <div class="card-action">
                        <a id="download-button" class="btn-small waves-effect waves-light green" class="white-text"
                           href="{{route('house.show', $value['id'])}}">Бронировать</a>
                        @if (Auth::user()->role == true)
                            <a id="download-button" class="btn-small waves-effect waves-light blue"
                               class="white-text"
                               href="{{route('parking.edit', $value['id'])}}">Редактировать</a>
                            <h6></h6>
                            <form method="POST" action="{{route('parking.destroy', $value['id'])}}">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <button id="download-button" class="btn-small btn red ajax" type="submit" name="action">
                                    Удалить
                                </button>
                            </form>
                        @endif
                    </div>
                </div>
            @endforeach
            {{--            {!! $parkingData->render() !!}--}}
            {{--            @foreach ($data as $value)--}}
            {{--                <div class="card white darken-1">--}}
            {{--                    <div class="card-content black-text">--}}
            {{--                        <span class="card-title">Парковочное место №{{ $value->placeNumber }}</span>--}}
            {{--                        <span class="card-title">{{ $value->typeName }}</span>--}}
            {{--                        <span class="card-title">{{ $value->pricePerDay }} ₽ в день</span>--}}
            {{--                    </div>--}}
            {{--                    <div class="card-action">--}}
            {{--                        <a id="download-button" class="btn-small waves-effect waves-light green" class="white-text"--}}
            {{--                           href="{{route('house.show', $value->id)}}">Выбрать</a>--}}
            {{--                        @if (Auth::user()->role == true)--}}
            {{--                            <a id="download-button" class="btn-small waves-effect waves-light blue"--}}
            {{--                               class="white-text"--}}
            {{--                               href="{{route('house.edit', $value)}}">Редактировать</a>--}}
            {{--                            <h6></h6>--}}
            {{--                            <form method="POST" action="{{route('house.destroy', $value)}}">--}}
            {{--                                {{ csrf_field() }}--}}
            {{--                                {{ method_field('DELETE') }}--}}
            {{--                                <button id="download-button" class="btn-small btn red" type="submit" name="action">--}}
            {{--                                    Удалить--}}
            {{--                                </button>--}}
            {{--                            </form>--}}
            {{--                        @endif--}}
            {{--                    </div>--}}
            {{--                </div>--}}
            {{--            @endforeach--}}
            {{--            {!! $data->render() !!}--}}
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

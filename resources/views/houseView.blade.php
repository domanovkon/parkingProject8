@extends('layouts.navbar')

@section('title')
    Аренда парковочного места
@endsection

@section('body')
    <div class="row">
        <div class="col s12 m6">
            @if (Auth::user()->role == true)
                <h6></h6>
                <a id="download-button" class="btn-small waves-effect waves-light orange" class="white-text"
                   href="{{ route('house.create') }}"><i
                            class="material-icons left">add_circle</i>Создать</a>
            @endif
            @foreach ($data as $value)
                <div class="card white darken-1">
                    <div class="card-content black-text">
                        <span class="card-title">{{ $value->address }}</span>
                    </div>
                    <div class="card-action">
                        <a id="download-button" class="btn-small waves-effect waves-light green" class="white-text"
                           href="{{route('house.show', $value->id)}}">Выбрать</a>
                        @if (Auth::user()->role == true)
                            <a id="download-button" class="btn-small waves-effect waves-light blue" class="white-text"
                               href="{{route('house.edit', $value)}}">Редактировать</a>
                            <h6></h6>
                            <form method="POST" action="{{route('house.destroy', $value)}}" class="ajax">

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
            {!! $data->render() !!}
        </div>
        <div class="row">
            <div class="col s12 m6">
                <div class="card">
                    <div class="card-image">
                        <img src="https://www.rudorogi.ru/content/upload/image/pdd/parking-in-courtyard.jpg">
                        <span class="card-title">Адреса</span>
                        <span class="card-title">Адреса</span>
                    </div>
                    <div class="card-content">
                        <h6>Выберете адрес дома, рядом с которым хотите арендовать парковочное место.</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

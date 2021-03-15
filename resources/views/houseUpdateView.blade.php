@extends('layouts.navbar')

@section('title', isset($house) ? 'Редактирование адреса ' . $house->address : 'Создать адрес')

@section('body')
    <div class="row">
        <div class="col s12 m6">
            <div class="row">
                <div class="col s12"><p></p></div>
                <div class="col s12 m4 l2"></div>
                <div class="col s12 m4 l8">
                    <form method="POST" @if (isset($house)) action="{{ route('house.update', $house) }}"
                          @else
                          action="{{ route('house.store') }}" @endif>
                        {{ isset($house) ? method_field('PUT') : method_field('POST') }}
                        {{ csrf_field() }}
                        <div class="row">
                            <input name="address" value="{{ old('address', isset($house) ? $house->address : null) }}"
                                   type="text" class="form-control" placeholder="Адрес" aria-label="address">
                            @if ($errors->has('address'))
                                <span class="red-text">{{ $errors->first('address') }}</span>
                            @endif
                        </div>
                        <div class="row">
                            <button id="download-button" class="btn-small btn green" type="submit"
                                    name="action">{{ isset($house) ? 'Обновить' : 'Добавить' }}</button>
                            <a id="download-button" class="btn-small waves-effect waves-light black" class="white-text"
                               href="/house">Отмена</a>
                        </div>
                    </form>
                </div>
                <div class="col s12 m4 l2"><p></p></div>
            </div>
        </div>
        <div class="row">
            <div class="col s12 m6">
                <div class="card">
                    <div class="card-image">
                        <img src="https://www.rudorogi.ru/content/upload/image/pdd/parking-in-courtyard.jpg">
                        <span class="card-title">Редактировать адрес</span>
                    </div>
                    <div class="card-content">
                        <h6>Напишите измененный адрес дома.</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@extends('layouts.navbar')

@section('title', isset($parking) ? 'Редактирование парковочного места ' . $parking->placeNumber : 'Создать парковочное место')

@section('body')
    <div class="row">
        <div class="col s12 m6">
            <div class="row">
                <div class="col s12"><p></p></div>
                <div class="col s12 m4 l2"></div>
                <div class="col s12 m4 l8">
                    <form method="POST" @if (isset($parking)) action="{{ route('parking.update', $parking) }}"
                          @else
                          action="{{ route('parking.store') }}" @endif>
                        {{ isset($parking) ? method_field('PUT') : method_field('POST') }}
                        {{ csrf_field() }}
                        <div class="row">
                            <input name="placeNumber"
                                   value="{{ old('placeNumber', isset($parking) ? $parking->placeNumber : null) }}"
                                   type="text" class="form-control" placeholder="Номер места" aria-label="placeNumber">
                            @if ($errors->has('placeNumber'))
                                <span class="red-text">{{ $errors->first('placeNumber') }}</span>
                            @endif
                            <input name="pricePerDay"
                                   value="{{ old('pricePerDay', isset($parking) ? $parking->pricePerDay : null) }}"
                                   type="text" class="form-control" placeholder="Цена" aria-label="pricePerDay">
                            @if ($errors->has('pricePerDay'))
                                <span class="red-text">{{ $errors->first('pricePerDay') }}</span>
                            @endif
                            @if (isset($parking))
                                <select name="typeId" style="display: block">
                                    @foreach($parkingTypesToUpdate as $parkingTypesToUpdates)
                                        <option
                                            value="{{ $parkingTypesToUpdates->id }}"> {{ $parkingTypesToUpdates->typeName }} </option>
                                    @endforeach
                                </select>
                                <input id="houseId" name="houseId" type="hidden"
                                       value="{{ old('houseId', isset($parking) ? $parking->houseId : $houseId) }}">
                            @endif
                            @if (isset($parkingTypes))
                                <select name="typeId" style="display: block">
                                    @foreach($parkingTypes as $parkingType)
                                        <option value="{{ $parkingType->id }}"> {{ $parkingType->typeName }} </option>
                                    @endforeach
                                </select>
                                <input id="houseId" name="houseId" type="hidden"
                                       value="{{ old('houseId', isset($parking) ? $parking->houseId : $houseId) }}">
                            @endif
                        </div>
                        <div class="row">
                            <button id="download-button" class="btn-small btn green" type="submit"
                                    name="action">{{ isset($parking) ? 'Обновить' : 'Добавить' }}</button>
                            <a id="download-button" class="btn-small waves-effect waves-light black" class="white-text"
                               href="{{isset($parking) ? route('house.show', $parking->houseId) : url()->previous()}}">Отмена</a>
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
                        <img
                            src="http://avtojurcon.ru/wp-content/uploads/2018/11/chto-oznachaet-znak-parkovka-10-15-20.jpg">
                        <span class="card-title">Редактировать парковочное место</span>
                    </div>
                    <div class="card-content">
                        <h6>Напишите измененные параметры парковочного места.</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

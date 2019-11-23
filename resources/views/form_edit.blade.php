@extends('layout')
@section('content')

<div class="container">
    @include('errors')

    <!-- ############################### -->
    <!-- Информация о клиенте -->

    <form action="{{ url('/save/'.$data->first()->user_id) }}" method="POST">
        <div>
            <h2>Клиент</h2>
        </div>
        <div class="row">
            <div class="col col-lg-6">
                <input type="text" class="form-control" name="name" placeholder="ФИО *" value="{{ $data->first()->name }}" pattern="[a-zA-ZА-Яа-яЁё\s]{3,100}">
            </div>
        </div>
        <div class="row">
            <div class="col col-lg-1">
                <label>Пол *</label>
            </div>
            <div class="col col-lg-5">
                <select class="form-control" name="sex">
                    @if($data->first()->sex)
                    <option selected value="1">Мужской</option>
                    <option value="0">Женский</option>
                    @else
                    <option value="1">Мужской</option>
                    <option selected value="0">Женский</option>
                    @endif
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col col-lg-6">
                <input class="form-control" name="phone" placeholder="Телефон *" value="{{ $data->first()->phone }}" type="tel" pattern="\+[0-9]{11}">
            </div>
        </div>
        <div class="row align-items-end">
            <div class="col col-lg-6">
                <input type="text" class="form-control" name="address" placeholder="Адрес" value="{{ $data->first()->address }}" pattern="[А-Яа-яЁё0-9\s]">
            </div>
            <div class="col col-lg-2">
                {{ csrf_field() }}
                {{ method_field('POST') }}
                <button type="submit" class="btn btn-success">
                    Сохранить
                </button>
            </div>
        </div>
        <div>
            <br>
        </div>
    </form>

    <!-- ############################### -->
    <!-- Информация об авто -->

    <div>
        <h2>Автомобили</h2>
    </div>

    <!-- ############################### -->
    <!-- Генераци форм для существующих авто -->

    @foreach($data as $car)
    <form action="{{ url('/save/'.$car->user_id) }}" method="POST">
        <input type="hidden" id="id" name="id" value="{{ $car->id }}">
        <div class="row">
            <div class="col col-lg-6">
                <input type="text" class="form-control" name="brand" placeholder="Марка *" value="{{ $car->brand }}" pattern="[a-zA-ZА-Яа-яЁё0-9\s]{3,100}">
            </div>
        </div>
        <div class="row">
            <div class="col col-lg-6">
                <input type="text" class="form-control" name="model" placeholder="Модель *" value="{{ $car->model }}" pattern="[a-zA-ZА-Яа-яЁё0-9\s]{3,100}">
            </div>
        </div>
        <div class="row">
            <div class="col col-lg-6">
                <input type="text" class="form-control" name="color" placeholder="Цвет кузова *" value="{{ $car->color }}" pattern="[a-zA-ZА-Яа-яЁё\s]{3,100}">
            </div>
        </div>
        <div class="row">
            <div class="col col-lg-6">
                <input type="text" class="form-control" name="statenum" placeholder="Гос Номер РФ *" value="{{ $car->statenum }}" pattern="[АВЕКМНОРСТУХ0-9]{7,15}">
            </div>
            <div class="form-group">
                {{ csrf_field() }}
                {{ method_field('POST') }}
                <button type="submit" class="btn btn-success">
                    Сохранить
                </button>
            </div>
        </div>
    </form>
    <div><br></div>
    @endforeach

    <!-- ############################### -->
    <!-- Дополнительная форма для авто -->

    <form action="{{ url('/save/'.$data->first()->user_id) }}" method="POST">
        <input type="hidden" id="id" name="id" value="0">
        <div class="row">
            <div class="col col-lg-6">
                <input type="text" class="form-control" name="brand" placeholder="Марка" pattern="[a-zA-ZА-Яа-яЁё0-9\s]{3,100}">
            </div>
        </div>
        <div class="row">
            <div class="col col-lg-6">
                <input type="text" class="form-control" name="model" placeholder="Модель" pattern="[a-zA-ZА-Яа-яЁё0-9\s]{3,100}">
            </div>
        </div>
        <div class="row">
            <div class="col col-lg-6">
                <input type="text" class="form-control" name="color" placeholder="Цвет кузова" pattern="[a-zA-ZА-Яа-яЁё\s]{3,100}">
            </div>
        </div>
        <div class="row">
            <div class="col col-lg-6">
                <input type="text" class="form-control" name="statenum" placeholder="Гос Номер РФ" pattern="[АВЕКМНОРСТУХ0-9]{7,15}">
            </div>
            <div class="form-group">
                {{ csrf_field() }}
                {{ method_field('POST') }}
                <button type="submit" class="btn btn-success">
                    Сохранить
                </button>
            </div>
        </div>
    </form>
    <div><br></div>

</div>

@endsection
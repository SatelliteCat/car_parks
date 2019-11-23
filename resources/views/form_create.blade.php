@extends('layout')
@section('content')

<div class="container">
    @include('errors')

    <form action="{{ url('/save/0') }}" method="POST">

        <!-- ############################### -->
        <!-- Информация о клиенте -->

        <div>
            <h2>Новый клиент</h2>
        </div>
        <div class="row">
            <div class="col col-lg-6">
                <input type="text" class="form-control" name="name" placeholder="ФИО *" pattern="[a-zA-ZА-Яа-яЁё\s]{3,100}">
            </div>
        </div>
        <div class="row">
            <div class="col col-lg-1">
                <label>Пол *</label>
            </div>
            <div class="col col-lg-5">
                <select class="form-control" name="sex">
                    <option selected value="1">Мужской</option>
                    <option value="0">Женский</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col col-lg-6">
                <input class="form-control" name="phone" placeholder="Телефон * (формат: +79990001122)" type="tel" pattern="\+[0-9]{11}">
            </div>
        </div>
        <div class="row align-items-end">
            <div class="col col-lg-6">
                <input type="text" class="form-control" name="address" placeholder="Адрес" pattern="[А-Яа-яЁё0-9\s]">
            </div>

        </div>
        <div>
            <br>
        </div>

        <!-- ############################### -->
        <!-- Информация об авто -->

        <div>
            <h2>Автомобиль</h2>
        </div>
        <div class="row">
            <div class="col col-lg-6">
                <input type="text" class="form-control" name="brand" placeholder="Марка *" pattern="[a-zA-ZА-Яа-яЁё0-9\s]{3,100}">
            </div>
        </div>
        <div class="row">
            <div class="col col-lg-6">
                <input type="text" class="form-control" name="model" placeholder="Модель *" pattern="[a-zA-ZА-Яа-яЁё0-9\s]{3,100}">
            </div>
        </div>
        <div class="row">
            <div class="col col-lg-6">
                <input type="text" class="form-control" name="color" placeholder="Цвет кузова *" pattern="[a-zA-ZА-Яа-яЁё\s]{3,100}">
            </div>
        </div>
        <div class="row">
            <div class="col col-lg-6">
                <input type="text" class="form-control" name="statenum" placeholder="Гос. номер РФ *" pattern="[АВЕКМНОРСТУХ0-9]{7,15}">
            </div>
        </div>
        <div><br></div>
        <div class="col col-lg-2">
            {{ csrf_field() }}
            {{ method_field('POST') }}
            <button type="submit" class="btn btn-success">
                Сохранить
            </button>
        </div>
    </form>
</div>

@endsection
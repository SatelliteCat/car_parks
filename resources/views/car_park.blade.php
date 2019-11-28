@extends('layout')
@section('content')

<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script type="text/javascript" src="{{ URL::asset('assets/js/registrarion.js') }}"></script>

<div class="container">
    @include('errors')
    <div>
        <h2>Система учёта авто на стоянке</h2>
    </div>
    <div><br></div>
    <form action="{{ url('/savestatus/') }}" method="POST">
        <div class="row">
            <div class="col col-lg-3">
                <select class="form-control users" name="user">
                    <option value="">Выберите клиента</option>
                    @foreach($users as $user)
                    <option selected="selected" value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col col-lg-3">
                <select class="form-control cars" name="car">
                    <option value="">Выберите автомобиль</option>
                    @foreach($cars as $car)
                    <option value="{{ $car->id }}" data-clientid="{{ $car->user_id }}" style="display:none">{{ $car->statenum }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div><br></div>
        <div class="row">
            <div class="col-5 col-md-2">
                {{ csrf_field() }}
                {{ method_field('POST') }}
                <button type="submit" name="isparked" value="1" class="btn btn-success">
                    На стоянке
                </button>
            </div>
            <div class="col-5 col-md-2">
                {{ csrf_field() }}
                {{ method_field('POST') }}
                <button type="submit" name="isparked" value="0" class="btn btn-danger">
                    Не на стоянке
                </button>
            </div>
        </div>
    </form>
</div>

@endsection
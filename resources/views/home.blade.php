@extends('layout')
@section('content')

<div class="container">
  <div>
    <h1>Клиенты</h1>
  </div>
  <table class="table table-hover">
    <tbody>
      @foreach($users as $user)
      <tr>
        <td>{{ $user->name }}</td>
        <td>{{ $user->brand }} {{ $user->model }} {{ $user->color }}</td>
        @if($user->isparked)
        <td>На стоянке</td>
        @else
        <td>Не на стоянке</td>
        @endif
        <td>{{ $user->statenum }}</td>
        <td>
          <form action="{{ url('edit/'.$user->id) }}" method="GET">
            {{ method_field('GET') }}
            <button class="btn btn-primary">
              Изменить
            </button>
          </form>
        </td>
        <td>
          <form action="{{ url('users/'.$user->id) }}" method="POST">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}
            <button class="btn btn-danger">
              Удалить
            </button>
          </form>
        </td>
      </tr>
      @endforeach
      <tr>
        <td colspan='4'></td>
        <td>
          <form action="{{ url('create') }}" method="GET">
            {{ method_field('GET') }}
            <button class="btn btn-primary">
              Добавить
            </button>
          </form>
        </td>
        <td>
          <button class="btn btn-danger">
            Удалить
          </button>
        </td>
      </tr>
    </tbody>
  </table>
  {{ $users->links() }}
</div>

@endsection
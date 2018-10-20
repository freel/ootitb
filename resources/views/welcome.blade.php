@extends('layouts.app')

@section('content')
<div class="container">

  <ul class="nav flex-column">
    <li class="nav-item">
      <a href="{{ route('quiz.index') }}" type="button" class="btn btn-primary btn-lg btn-block">Пройти тестирование</a>

    </li>

  </ul>
</div>
@endsection

@extends('layouts.app')

@section('content')
  <div class="container">
    <span>Билет №{{$paper->id}}</span>
    <div class="alert alert-info" role="alert">
      Результат {{$questions_count - $mistakes->count()}} правильных ответов из {{$questions_count}}
    </div>

    @foreach ($mistakes as $mistake)
      <div class="jumbotron">
        <h5>{{$mistake->question->text}}</h5>
        <p>Верный ответ</p>
        <div class="alert alert-success" role="alert">
          @foreach ($mistake->right as $right)
            <p>{{$right->text}}</p>

          @endforeach
        </div>
        <p>Ваш ответ</p>
        <div class="alert alert-danger" role="alert">
          @foreach ($mistake->mistakes as $wrong)
            <p>{{$wrong->text}}</p>

          @endforeach
        </div>
      </div>

    @endforeach
  </div>

@endsection

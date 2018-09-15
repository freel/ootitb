@extends('layouts.app')

@section('content')
  <div class="container">
    <span>Билет №{{$paper->id}}</span>
    <p><span>Результат {{$paper->questions()->count() - $mistakes->count()}}
      правильных ответов из {{$paper->questions()->count()}}</span>

  </div>
@endsection

@extends('layouts.app')

@section('content')
  <div class="container">
      @include('test.partials.form')

      {{ $questions->links() }}
  </div>
  @isset($tests)
    <div class="container">
      <a href="{{route('test.exam')}}" class="btn btn-primary">Начать тест</a>

    </div>
  @endisset
@endsection

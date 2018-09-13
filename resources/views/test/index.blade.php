@extends('layouts.app')

@section('content')
  <div class="container">
    @foreach ($test_groups as $group)
      <div class="row">

        @if ($group->papers->count())
          <div class="col-lg-8">
            <span>{{ $group->description_short }}</span>
            <a href="{{ route('test.exam', $group ) }}" class="btn btn-primary">Начать тест</a>
          </div>
        @else
          <div class="col-lg-8">
            <a href="{{ route('test.index', $group ) }}">{{ $group->description_short }}</a>
          </div>
        @endif
      </div>
    @endforeach
  </div>
  {{-- @isset($start_test)
    <div class="container">
      <a href="{{ route('test.exam', $test_groups->first() ) }}" class="btn btn-primary">Начать тест</a> --}}
      {{-- <a href="#" class="btn btn-primary">Начать тест</a> --}}

    {{-- </div>
  @endisset --}}
@endsection

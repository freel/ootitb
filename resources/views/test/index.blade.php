@extends('layouts.app')

@section('content')
  <div class="container">
    @foreach ($test_groups as $group)
      <div class="row">

        @if ($group->papers->count())
          <div class="col-lg-8">
            <span>{{ $group->title }}</span>
            <a href="{{ route('test.exam', $group ) }}" class="btn btn-primary">Начать тест</a>
          </div>
        @else
          <div class="col-lg-8">
            <a href="{{ route('test.index', $group ) }}">{{ $group->title }}</a>
          </div>
        @endif
      </div>
    @endforeach

    {{ $test_groups->links() }}
  </div>
@endsection

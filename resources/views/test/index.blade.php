@extends('layouts.app')

@section('content')
  <div class="container">
    <ul class="nav flex-column">
      @foreach ($test_groups as $group)
        <li class="nav-item inline">
          @if ($group->children()->count())
            <a href="{{ route('test.index', $group ) }}" class="nav-link inline">{{ $group->title }}</a>
          @else
            <a class="nav-link disabeled inline">{{ $group->title }}</a>
          @endif
          @if ($group->papers->count())
            <a href="{{ route('test.exam', $group ) }}" class="btn btn-primary inline">Начать тест</a>
          @endif
        </li>
      @endforeach
    </ul>

    {{ $test_groups->links() }}
  </div>
@endsection

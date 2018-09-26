@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="card-deck">
      @foreach ($categories as $group)
        <div class="col-sm-4 d-flex align-items-stretch">
          <div class="card mb-3" style="width: 18rem;">
            {{-- <img class="card-img-top" src=".../100px180/" alt="Card image cap"> --}}
            <div class="card-body">
              <h5 class="card-title">{{ $group->title }}</h5>
              <p class="card-text">{{ $group->description_short }}</p>
            </div>
            <div class="card-footer">
              @if ($group->children()->count())
                <a href="{{ route('quiz.index', $group ) }}" class="btn btn-primary">Продолжить</a>
              @endif
              @if ($group->papers->count())
                <a href="{{ route('quiz.exam', $group ) }}" class="btn btn-primary">Начать тест</a>
              @endif
            </div>
          </div>

        </div>
      @endforeach
    </div>

    {{ $categories->links() }}
  </div>
@endsection

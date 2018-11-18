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
              @elseif ($group->papers->count() or $group->questions->count())
                <a href="{{ route('try.quiz', $group ) }}" class="btn btn-secondary">Пробный тест</a>
                <a href="{{ route('exam.quiz', $group ) }}" class="btn btn-primary float-right">Начать тест</a>
              @else
                <a href="" class="btn btn-primary disabled">Готовим тест</a>
              @endif
            </div>
          </div>

        </div>
      @endforeach
    </div>

    {{ $categories->links() }}
  </div>
@endsection

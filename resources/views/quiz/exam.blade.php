@extends('layouts.app')

@section('content')
  <div class="container">
    <h4>Билет №{{$paper->id}}</h4>
    <hr>

    <form class="" action="{{route('quiz.answer', ['id' => $category, 'paper_id' => $paper ]) }}" method="post">
      {{csrf_field()}}

      <pagination-component :questions='{!! json_encode($questions) !!}'>
      </pagination-component>
      {{-- @include('quiz.partials.form') --}}


      <input class="btn btn-primary" type="submit" value="Ответить">

    </form>

      {{-- {{ $questions->links() }} --}}

  </div>
@endsection

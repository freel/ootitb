@extends('layouts.app')

@section('content')
  <div class="container">
    <h4>Билет №{{$paper->id}}</h4>
    <hr>

    <form class="" action="{{route('quiz.answer', ['id' => $category, 'paper_id' => $paper ]) }}" method="post">
      {{csrf_field()}}

      @include('quiz.partials.form')


    </form>

      {{-- {{ $questions->links() }} --}}

  </div>
@endsection

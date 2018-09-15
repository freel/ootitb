@extends('layouts.app')

@section('content')
  <div class="container">
    <span>Билет №{{$paper->id}}</span>
    <form class="" action="{{route('test.answer', ['id' => $test_group, 'paper_id' => $paper ]) }}" method="post">
      {{csrf_field()}}

      @include('test.partials.form')


    </form>

      {{-- {{ $questions->links() }} --}}

  </div>
@endsection

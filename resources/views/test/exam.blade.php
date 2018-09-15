@extends('layouts.app')

@section('content')
  <div class="container">
    <h4>Билет №{{$paper->id}}</h4>
    <hr>
    
    <form class="" action="{{route('test.answer', ['id' => $test_group, 'paper_id' => $paper ]) }}" method="post">
      {{csrf_field()}}

      @include('test.partials.form')


    </form>

      {{-- {{ $questions->links() }} --}}

  </div>
@endsection

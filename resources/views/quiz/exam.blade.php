@extends('layouts.app')

@section('content')
  <div class="container">
    <h4>Билет №{{$paper['id']}}</h4>
    <hr>
      {{-- <quiz-component
        action='{{route('exam.answer', ['id' => $category, 'paper_id' => $paper["id"] ]) }}'
        :questions='{{ json_encode($questions) }}'
        @isset($timer)
          :timer={{$timer}}
        @endisset
        >
      </quiz-component> --}}
      <quiz
        action='{{route('exam.answer', ['id' => $category, 'paper_id' => $paper["id"] ]) }}'
        :questions='{{ json_encode($questions) }}'
      />
  </div>
@endsection

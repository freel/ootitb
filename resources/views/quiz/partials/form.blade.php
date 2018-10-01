@foreach ($questions as $question)
  {{-- <h6>{!! $question->answers()->inRandomOrder()->get() !!}</h6> --}}
  <quiz-component text='{{ $question->text }}' :answers='{!! json_encode($question->answers()->inRandomOrder()->get()) !!}'>
    {{-- @include('quiz.partials.answers', ['answers' => $question->answers()->inRandomOrder()->get()]) --}}
  </quiz-component>
  {{-- <div class="jumbotron">
    <h5>{{ $question->text }}</h5>

    @include('quiz.partials.answers', ['answers' => $question->answers()->inRandomOrder()->get()])

  </div> --}}
@endforeach

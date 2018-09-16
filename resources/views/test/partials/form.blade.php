@foreach ($questions as $question)
  <div class="jumbotron">
    <h5>{{ $question->text }}</h5>

    @include('test.partials.answers', ['answers' => $question->answers()->inRandomOrder()->get()])

  </div>
@endforeach


<input class="btn btn-primary" type="submit" value="Ответить">

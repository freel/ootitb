@foreach ($questions as $question)
  <div class="jumbotron">
    <p>{{ $question->text }}</p>

    @include('test.partials.answers', ['answers' => $question->answers()->inRandomOrder()->get()])

  </div>
@endforeach


<input class="btn btn-primary" type="submit" value="Ответить">

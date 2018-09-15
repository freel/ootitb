@foreach ($questions as $question)
  <div class="row" name="question[]">
    <div class="col-lg-8">
      <span>{{ $question->text }}</span>
    </div>
  </div>

  <div class="row">
    <div class="col-lg-8">
      @include('test.partials.answers', ['answers' => $question->answers()->inRandomOrder()->get()])
    </div>
  </div>
@endforeach


<input class="btn btn-primary" type="submit" value="Ответить">

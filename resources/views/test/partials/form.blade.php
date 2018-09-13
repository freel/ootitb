<div class="row">
  <div class="col-lg-8">
    <span>{{ $questions->first()->text }}</span>
  </div>
</div>

<div class="row">
  <div class="col-lg-8">
    @include('test.partials.answers')
  </div>
</div>

<input class="btn btn-primary" type="submit" value="Ответить">

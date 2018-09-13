<div class="form-group">
  <label for="title">Название</label>
  <input type="text" class="form-control" name="title"
  @if (isset($question->id))
    value="{{$question->title}}"
  @endif />
</div>
<div class="form-group">
  <label for="text">Текст</label>
  <textarea name="text" class="form-control" rows="8" cols="80">@if (isset($question->id)){{$question->text}}@endif</textarea>
</div>
<div class="form-group">
  <label for="test_groups">Родительская область</label>
  <select class="form-control" multiple="multiple" name="papers[]">
    {{-- Selector include --}}
    @include('admin.questions.partials.areas', ['test_groups' => $test_groups])

  </select>

</div>

@include('admin.questions.partials.answers')

<hr>
<input class="btn btn-primary" type="submit" value="Сохранить">

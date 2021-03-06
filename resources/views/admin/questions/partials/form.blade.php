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
@include('admin.questions.partials.answers')

<div class="form-group">
  <label for="categories">Родительская область</label>
  <select class="form-control" multiple="multiple" name="papers[]">
    {{-- Selector include --}}
    @include('admin.questions.partials.areas', ['categories' => $categories])
  </select>
</div>

<hr>
<input class="btn btn-primary" type="submit" value="Сохранить">

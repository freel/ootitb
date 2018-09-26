<div class="form-group">
  <label for="title">Индекс</label>
  <input type="text" class="form-control" name="title"
  @if (isset($category->id))
    value="{{$category->title}}"
  @endif />
</div>
<div class="form-group">
  <label for="title">Наименование</label>
  <input type="text" class="form-control" name="description_short"
  @if (isset($category->id))
    value="{{$category->description_short}}"
  @endif />
</div>
<div class="form-group">
  <label for="description">Описание</label>
  <textarea name="description" class="form-control" rows="8" cols="80">@if (isset($category->id)){{$category->description}}@endif</textarea>
</div>
<div class="form-group">
  <label for="parent_id">Группа</label>
  <select class="form-control" name="parent_id">
    <option value="0">-- без родительской группы --</option>

    {{-- Selector include --}}
    @include('admin.categories.partials.parents', ['categories' => $categories])

  </select>
</div>
<hr>
<input class="btn btn-primary" type="submit" value="Сохранить">

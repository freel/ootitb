<div class="form-group">
  <label for="title">Наименование</label>
  <input type="text" class="form-control" name="title"
  @if (isset($test_group->id))
    value="{{$test_group->title}}"
  @endif />
</div>
<div class="form-group">
  <label for="title">Краткое описание</label>
  <input type="text" class="form-control" name="text"
  @if (isset($test_group->id))
    value="{{$test_group->description_short}}"
  @endif />
</div>
<div class="form-group">
  <label for="description">Описание</label>
  <textarea name="description" class="form-control" rows="8" cols="80">@if (isset($test_group->id)){{$test_group->description}}@endif</textarea>
</div>
<div class="form-group">
  <label for="parent_id">Группа</label>
  <select class="form-control" name="parent_id">
    <option value="0">-- без родительской группы --</option>

    {{-- Selector include --}}
    @include('admin.test_groups.partials.parents', ['test_groups' => $test_groups])

  </select>
</div>
<hr>
<input class="btn btn-primary" type="submit" value="Сохранить">

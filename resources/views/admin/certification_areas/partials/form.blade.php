<div class="form-group">
  <label for="title">Область</label>
  <input type="text" class="form-control" name="title"
  @if (isset($certification_area->id))
    value="{{$certification_area->title}}"
  @endif />
</div>
<div class="form-group">
  <label for="title">Наименование</label>
  <input type="text" class="form-control" name="text"
  @if (isset($certification_area->id))
    value="{{$certification_area->text}}"
  @endif />
</div>
<div class="form-group">
  <label for="description">Описание</label>
  <textarea name="description" class="form-control" rows="8" cols="80">@if (isset($certification_area->id)){{$certification_area->description}}@endif</textarea>
</div>
<div class="form-group">
  <label for="parent_id">Родительская область</label>
  <select class="form-control" name="parent_id">
    <option value="0">-- без родительской области --</option>

    {{-- Selector include --}}
    @include('admin.certification_areas.partials.parents', ['certification_areas' => $certification_areas])

  </select>
</div>
<hr>
<input class="btn btn-primary" type="submit" value="Сохранить">

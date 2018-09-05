<div class="form-group">
  <label for="title">Наименование области</label>
  <input type="text" class="form-control" name="title" value="">
</div>
<div class="form-group">
  <label for="description">Описание</label>
  <textarea name="description" class="form-control" rows="8" cols="80"></textarea>
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

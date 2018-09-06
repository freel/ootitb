<div class="form-group">
  <label for="title">Название</label>
  <input type="text" class="form-control" name="title" value="">
</div>
<div class="form-group">
  <label for="text">Текст</label>
  <textarea name="text" class="form-control" rows="8" cols="80"></textarea>
</div>
<div class="form-group">
  <label for="certification_areas">Родительская область</label>
  <select class="form-control" multiple="multiple" name="certification_areas[]">
    <option value="0">-- без родительской области --</option>

    {{-- Selector include --}}
    @include('admin.questions.partials.areas', ['certification_areas' => $certification_areas])

  </select>
</div>
<hr>
<input class="btn btn-primary" type="submit" value="Сохранить">

<div class="form-group">
  <label for="title">Профессия</label>
  <input type="text" class="form-control" name="name"
  @if (isset($profession->id))
    value="{{$profession->name}}"
  @endif />
</div>
<div class="form-group">
  <label for="title">Описание</label>
  <input type="text" class="form-control" name="description"
  @if (isset($profession->id))
    value="{{$profession->description}}"
  @endif />
</div>
<hr>
<input class="btn btn-primary" type="submit" value="Сохранить">

<div class="form-group">
  <label for="title">ФИО</label>
  <input type="text" class="form-control" name="title"
  @if (isset($user->id))
    value="{{$user->title}}"
  @endif />
</div>
<div class="form-group">
  <label for="title">Email</label>
  <input type="text" class="form-control" name="email"
  @if (isset($user->id))
    value="{{$user->email}}"
  @endif />
</div>
<div class="form-group">
  <label for="title">Email</label>
  <input type="text" class="form-control" name="email">
</div>
<div class="form-group">
  <label for="parent_id">Профессия</label>
  <select class="form-control" name="parent_id">
    <option value="0">-- без родительской группы --</option>

    {{-- Selector include --}}
    {{-- @include('admin.test_groups.partials.parents', ['test_groups' => $test_groups]) --}}

  </select>
</div>
<hr>
<input class="btn btn-primary" type="submit" value="Сохранить">

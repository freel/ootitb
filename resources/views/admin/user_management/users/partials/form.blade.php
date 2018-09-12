<div class="form-group">
  <label for="title">ФИО</label>
  <input type="text" class="form-control" name="name"
  @if (isset($user->id))
    value="{{$user->name}}"
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
  <label for="title">Пароль</label>
  <input id="password" type="password" class="form-control" name="password" required="required">
</div>
<div class="form-group">
  <label for="parent_id">Профессия</label>
  <select class="form-control" name="profession">

    {{-- Selector include --}}
    @include('admin.user_management.users.partials.profession')

  </select>
</div>
<hr>
<input class="btn btn-primary" type="submit" value="Сохранить">

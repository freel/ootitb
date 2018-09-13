<div class="form-group">
  <label for="title">Количество билетов</label>
  <input type="text" class="form-control" name="paper_num"
  @if (isset($paper->id))
    value="{{$paper->paper_index}}"
  @endif />
</div>
<div class="form-group">
  <label for="test_groups">Группа</label>
  <select class="form-control " name="test_group_id">
    @include('admin.papers.partials.areas', ['test_groups' => $test_groups])
  </select>

</div>

<hr>
<input class="btn btn-primary" type="submit" value="Сохранить">

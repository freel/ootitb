<div class="form-group">
  <label for="title">Номер билета</label>
  <input type="text" class="form-control" name="paper_index"
  @if (isset($paper->id))
    value="{{$paper->paper_index}}"
  @endif />
</div>
<div class="form-group">
  <label for="test_groups">Родительская область</label>
  <select class="form-control " name="test_group">
    @include('admin.papers.partials.areas', ['test_groups' => $test_groups])
  </select>

</div>

<hr>
<input class="btn btn-primary" type="submit" value="Сохранить">

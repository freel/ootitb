<div class="form-group" id="answers">
  @isset($answers)
    @foreach ($answers as $key=>$answer)
      <div class="form-group form-inline">
        <input type="text" class="form-control" name="answers[]" value="{{ $answer->text }}">
        <input type="checkbox" class="custom-control-input" name="right[]" value="{{ $key }}" @if ($answer->right)
          checked
        @endif />
      </div>
    @endforeach
  @endisset
@empty ($answers)
  @for ($i = 0; $i < 4; $i++)
    <div class="form-group form-inline">
      <input type="text" class="form-control" name="answers[]" value="">
      <input type="checkbox" class="custom-control-input" name="right[]" value="{{ $i }}">
    </div>

  @endfor
@endempty
  {{-- <button id="add" class="btn btn-add">Добавить ответ</a> --}}
</div>
{{-- <script type="text/javascript">
  $('#add').click(function(){
    $('#answers').append('
      <div class="form-group inline">
        <input type="text" class="form-control" name="answers[]" value="">
        <input type="checkbox" class="form-control" name="right">
      </div>
    ')
  })
</script> --}}

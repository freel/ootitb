<div class="form-group" id="answers">
  <label>Ответы</label>
  @isset($answers)
    @foreach ($answers as $key=>$answer)
      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <div class="input-group-text">
            <input type="checkbox" aria-label="Checkbox for following text input" name="right[]" value="{{ $key }}" id="checkbox_{{ $key }}"
            @if ($answer->right)
              checked
            @endif />
          </div>
        </div>
        <input type="text" class="form-control" aria-label="Text input with checkbox" name="answers[]" value="{{ $answer->text }}">
      </div>

    @endforeach
  @endisset
@empty ($answers)
  @for ($i = 0; $i < 4; $i++)
    <div class="custom-control custom-checkbox mr-sm-2">
      <input type="text" class="custom-control-label" name="answers[]" value="" for="checkbox_{{ $answer->id }}">
      <input type="checkbox" class="custom-control-input" name="right[]" value="{{ $answer->id }}" id="checkbox_{{ $i }}">
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

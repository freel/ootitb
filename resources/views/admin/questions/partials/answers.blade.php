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
      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <div class="input-group-text">
            <input type="checkbox" aria-label="Checkbox for following text input" name="right[]" value="{{ $i }}" id="checkbox_{{ $i }}">
          </div>
        </div>
        <input type="text" class="form-control" aria-label="Text input with checkbox" name="answers[]">
      </div>
    @endfor
  @endempty
</div>

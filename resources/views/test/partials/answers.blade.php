<div class="form-group" id="answers">
  @isset($answers)
    @foreach ($answers as $answer)
      <div class="form-group form-inline">
        <input type="checkbox" class="custom-control-input" name="answers[]" value="{{ $answer->id }}">
        <label type="text" class="form-check-label">{{ $answer->text }}</label>
      </div>
    @endforeach
  @endisset
</div>

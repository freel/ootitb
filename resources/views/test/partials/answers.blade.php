<div class="col-auto my-1">
  @isset($answers)
    @foreach ($answers as $answer)
      <div class="custom-control custom-checkbox mr-sm-2">
        <input type="checkbox" class="custom-control-input" name="answers[]" value="{{ $answer->id }}" id="checkbox_{{ $answer->id }}">
        <label type="text" class="custom-control-label" for="checkbox_{{ $answer->id }}">{{ $answer->text }}</label>
      </div>
    @endforeach
  @endisset
</div>

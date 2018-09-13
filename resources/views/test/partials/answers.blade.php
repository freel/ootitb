<div class="form-group" id="answers">
  @isset($answers)
    @foreach ($answers as $key=>$answer)
      <div class="form-group form-inline">
        <input type="text" class="form-control" name="answers[]" value="{{ $answer->text }}">
        <input type="checkbox" class="custom-control-input" name="right[]" value="{{ $key }}">
      </div>
    @endforeach
  @endisset
</div>

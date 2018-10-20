<form action="{{ $action }}" method="post">
  {{csrf_field()}}
  {{-- <div class="input-group mb-3">
    <div class="input-group-prepend">
      <button class="btn btn-outline-secondary" type="submit" id="inputGroupFileAddon">Upload</button>
    </div>
    <div class="custom-file">
      <input type="file" class="custom-file-input" id="inputGroupFile" aria-describedby="fileHelp">
      <label class="custom-file-label" for="inputGroupFile">Choose file</label>
    </div>
  </div> --}}
  <div class="form-group">
    <input type="file" class="form-control-file" name="fileToUpload" id="exampleInputFile" aria-describedby="fileHelp">
    <small id="fileHelp" class="form-text text-muted">Пожалуйста выберите файл с тестами</small>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

  <div class="form-group">
    <input type="file" class="form-control-file" name="fileToUpload" id="exampleInputFile" aria-describedby="fileHelp">
    <small id="fileHelp" class="form-text text-muted">Пожалуйста выберите файл с тестами</small>
  </div>

  <div class="form-group">
    <label for="categories">Родительская область</label>
    <select class="form-control" multiple="multiple" name="categories[]">
      {{-- Selector include --}}
      @include('admin.questions.partials.areas', ['categories' => $categories])
    </select>
  </div>

  <button type="submit" class="btn btn-primary">Submit</button>

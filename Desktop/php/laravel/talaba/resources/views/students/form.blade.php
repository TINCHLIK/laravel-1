  <div class="mb-3">
    <label for="ism" class="form-label">Ism</label>
    <input type="text" class="form-control" id="ism" name="ism" value="{{old('ism') ?? $student->ism}}">
    @error('ism')
        <p class="text-danger">{{ $message }}</p>
    @enderror
  </div>
  <div class="mb-3">
    <label for="fam" class="form-label">Fam</label>
    <input type="text" class="form-control" id="fam" name="fam" value="{{old('fam') ?? $student->fam}}">
    @error('fam')
        <p class="text-danger">{{ $message }}</p>
    @enderror
  </div>
  <div class="mb-3">
    <label for="yosh" class="form-label">Yosh</label>
    <input type="number" class="form-control" id="yosh" name="yosh" value="{{old('yosh') ?? $student->yosh}}">
    @error('yosh')
        <p class="text-danger">{{ $message }}</p>
    @enderror
  </div>
  <div class="mb-3">
    <label class="form-check-label">Jisn</label><br>
    <input type="radio" class="" name="jins" id="erkak" value="1">
    <label class="form-check-label me-5 text-success fw-bold font-monospace">erkak</label>
    <input type="radio" class="" name="jins" id="ayol" value="0">
    <label class="form-check-label text-danger fw-bold font-monospace">ayol</label>
    @error('jins')
        <p class="text-danger">{{ $message }}</p>
    @enderror
  </div>

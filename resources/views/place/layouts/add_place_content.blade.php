@if($errors->all())
<div class="alert alert-danger">
    <ul>
      @foreach($errors->all() as $error)

      <li>
        {{  $error }}
      </li>

      @endforeach
    </ul>
  </div>
@endif

<form action="{{ route('places.store') }}" method="post" enctype="multipart/form-data">
  @csrf
  <div class="form-group">
    <label for="name">New Place</label>
    <input name="name" type="name" class="form-control" id="name" aria-describedby="emailHelp" value="{{ old('name') }}">
    <small id="emailHelp" class="form-text text-muted">Add new place.</small>
  </div>

  <div class="mb-3">
    <label for="validationTextarea">Description</label>
    <textarea name="desc" class="form-control" id="validationTextarea" placeholder="Add Place Description" required>
      {{ old('desc') }}
    </textarea>

  </div>

    <div class="form-group">
    <label for="exampleFormControlSelect1">Type of Place</label>
    <select name="type" class="form-control" id="exampleFormControlSelect1">
      <option>city</option>
      <option>country</option>
      <option>museum</option>
      <option>other</option>
    </select>
  </div>

  <div class="form-group">
    <label for="image">Add Photo</label>
    <input name="image" type="file" class="form-control-file" id="image">
  </div>

  <button type="submit" class="btn btn-primary">Submit</button>
</form>
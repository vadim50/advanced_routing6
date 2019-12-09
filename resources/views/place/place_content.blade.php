@if($place)
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
	<h1>{{ $place->name }}</h1>
	<form action="{{ route('photos.add') }}" method="post" enctype="multipart/form-data">
		@csrf
		<div class="form-group">
		    <label for="image">Add Photo</label>
		    <input name="image" type="file" class="form-control-file" id="image">
	 	</div>
	 	<input type="hidden" name="id" value="{{ $place->id }}">

	 	<button type="submit" class="btn btn-primary">Add Photo</button>
	
	</form>
	<p>{{ $place->desc }}</p>

	<p>{{ $place->type }}</p>

	<p>{{ $place->created_at }}</p>

	<div>

		<img src="{{ asset('assets/img/'.$place->image) }}" alt="">
		
	</div>
	@foreach($place->photos as $photo)
		<div style="padding-top:10px;">
			<img src="{{ asset('assets/img/'.$photo->link) }}" alt="">
		</div>
	@endforeach
	<br>
	<br>
	<a class="btn btn-success" href="{{ route('places.edit',['id'=>$place->id]) }}" title="">Edit...</a>

@endif

@if(isset($places))
<table>
	<thead>
		<tr>
			<th>Name</th>
			<th>Type</th>
			<th>Description</th>
			<th>Date</th>
			<th>Picture</th>
			<th>Link</th>
		</tr>
	</thead>
	<tbody>
		@foreach($places as $place)
		<tr>
			<td>{{ $place->name }}</td>
			<td>{{ $place->type }}</td>
			<td>{{ $place->desc }}</td>
			<td>{{ $place->created_at }}</td>
			<td><img src="{{ asset('assets/img/'.$place->image) }}" alt=""></td>
			<td><a class="btn btn-success" href="{{ route('places.show',['id'=>$place->id]) }}" title="">More..</a></td>
		</tr>
		@endforeach
	</tbody>
</table>
@endif
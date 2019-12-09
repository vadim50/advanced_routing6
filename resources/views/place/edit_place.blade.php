@extends(env('THEME').'.layouts.site')


@section('navbar')

	@include(env('THEME').'.layouts.navbar_content')

@endsection

@section
	@include(env('THEME').'.layouts.edit_place_content')
@endsection
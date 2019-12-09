@extends(env('THEME').'.layouts.site')

@section('navbar')

	@include(env('THEME').'.layouts.navbar_content')

@endsection

@section('content')

	@include(env('THEME').'.main_content')
	
@endsection
@extends('layouts.master')

@section('content')
	<h3>Your search for "{{ Request::input('query') }}"</h3>{{-- 'query' is the name field of search button  --}}

	@if (!$users->count())
		<p>No results found, sorry.</p>
	@endif
	<div class="row">
		<div class="col-lg-12">
			@foreach ($users as $user)
				@include('user.partials.userblock')
			@endforeach
			
		</div>
	</div>
@stop
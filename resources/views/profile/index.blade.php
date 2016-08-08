@extends('layouts.master')

@section('content')
	<div class="row">
		<div class="col-lg-5">
			{{-- User Profile --}}
			@include('user.partials.userblock')
			<hr>
		</div>
		<div class="col-lg-4 col-lg-offset-3">
			{{-- User's Friends --}}
			<h4 style="color: teal">{{ $user->getFirstNameOrUsername() }}'s friends.</h4>
			@if (!$user->friends()->count())
				<p>{{ $user->getFirstNameOrUsername() }} has no friends.</p>
			@else
				@foreach ($user->friends() as $user)
					@include('user.partials.userblock')
				@endforeach
			@endif
		</div>
	</div>
@stop
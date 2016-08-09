@extends('layouts.master')

@section('content')
	<div class="row">
		<div class="col-md-8">
			{{-- Your Friends --}}
			<h3 style="color: #2c3e98;">Your Friends</h3><hr>
			@if (!$friends->count())
				<p>You have no friends. <span style="color:teal;"><a href="https://www.instagram.com/toastmeetsworld/">Get a dog.</a> </span></p>
			@else
				@foreach ($friends as $user)
					@include('user.partials.userblock')
				@endforeach
			@endif		
		</div>
		<div class="col-md-4">
			{{-- Friend Requests --}}
			<h4 style="color: #2c3e98;">Your Friend Requests</h4>
			@if (!$requests->count())
				<p>You have no friend requests</p>
			@else
				@foreach ($requests as $user)
					@include('user.partials.userblock')
				@endforeach
			@endif
		</div>
	</div>
@stop
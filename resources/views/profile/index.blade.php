@extends('layouts.master')

@section('content')
	<div class="row">
		<div class="col-lg-5">
			{{-- User Profile --}}
			@include('user.partials.userblock')
			<hr>
		</div>
		<div class="col-lg-4 col-lg-offset-3">
			{{-- Friend Request Button --}}
			@if (Auth::user()->hasFriendRequestPending($user))
				<p>Waiting for {{ $user->getNameOrUsername() }} to accept your request.</p>
			@elseif(Auth::user()->hasFriendRequestReceived($user))
				<a href="#" class="btn btn-primary">Accept friend Request</a>
			@elseif(Auth::user()->isFriendsWith($user))
				<p>You and {{ $user->getNameOrUsername() }} are friends.</p>
			@else
				<a href="{{ route('friend.add', ['username'=>$user->username]) }}" class="btn btn-primary">Add as friend</a>
			@endif
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
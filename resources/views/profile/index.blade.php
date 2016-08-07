@extends('layouts.master')

@section('content')
	<div class="row">
		<div class="col-lg-5">
			{{-- User Profile --}}
			@include('user.partials.userblock')
			<hr>
		</div>
		<div class="col-lg-4 col-lg-offset-3">
			
		</div>
	</div>
@stop
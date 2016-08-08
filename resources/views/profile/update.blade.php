@extends('layouts.master')

@section('content')
	

	<div class="container" style="margin-left: 250px; margin-top: 50px">
		<center>
		<div class="row">
	    <div class="col-lg-6">
			<h3 style="color:teal">Update Your Profile</h3><hr>
	        <form class="form-vertical" role="form" method="post" action="{{ route('profile.update') }}">
	            <div class="col-lg-6">
	            	<div class="form-group{{ $errors->has('first_name') ? 'has-error' : '' }}">
	                	<label for="first_name" class="control-label">Your First Name</label>
	                	<input type="text" name="first_name" class="form-control" id="first_name" value="{{ Request::old('first_name')?: Auth::user()->first_name }}">
	                	@if ($errors->has('first_name'))
                			<span class="help-block" style="color:darkred;">{{ $errors->first('first_name') }}</span>
               			@endif
	               </div>
	            </div>
	            <div class="col-md-6">
	            	<div class="form-group{{ $errors->has('last_name') ? 'has-error' : '' }}">
	                	<label for="last_name" class="control-label">Your Last Name</label>
	                	<input type="text" name="last_name" class="form-control" id="last_name" value="{{ Request::old('last_name')?: Auth::user()->last_name }}">
	                	@if ($errors->has('last_name'))
                			<span class="help-block" style="color:darkred;">{{ $errors->first('last_name') }}</span>
               			@endif
	            	</div>
	            </div>
	            
	            <div class="form-group{{ $errors->has('location') ? 'has-error' : '' }}">
	                <label for="location" class="control-label">Your Location</label>
	                <input type="location" name="location" class="form-control" id="location" value="{{ Request::old('location')?: Auth::user()->location }}">
	                @if ($errors->has('location'))
                		<span class="help-block" style="color:darkred;">{{ $errors->first('location') }}</span>
               			@endif
	            </div>
	            <div class="form-group">
	                <button type="submit" class="btn btn-info btn-xm" style="font-size: 14px; color:white;">Update</button>
	            </div>
	            <input type="hidden" name="_token" value="{{ Session::token() }}">
	        </form>
	    </div>
	</div>
	</center>
	
	</div>
@stop